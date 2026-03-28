FROM php:8.1-fpm

# 安装依赖和 Nginx
RUN apt-get update && apt-get install -y \
    nginx git unzip libzip-dev libonig-dev && \
    docker-php-ext-install zip pdo pdo_mysql bcmath && \
    rm -rf /var/lib/apt/lists/*

# 安装 Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# 安装依赖
COPY composer.json composer.lock* ./
RUN composer install --no-dev --no-scripts --no-autoloader --prefer-dist

# 复制项目
COPY . .
RUN composer dump-autoload --optimize && \
    chown -R www-data:www-data /var/www/html && \
    chmod -R 755 /var/www/html && \
    mkdir -p config qrcode logs && \
    chmod -R 777 config qrcode logs

# Nginx 配置
RUN echo 'server {\n\
    listen 80;\n\
    root /var/www/html;\n\
    index index.php health.php;\n\
    location / {\n\
        try_files $uri $uri/ /index.php?$query_string;\n\
    }\n\
    location ~ \.php$ {\n\
        fastcgi_pass 127.0.0.1:9000;\n\
        fastcgi_index index.php;\n\
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;\n\
        include fastcgi_params;\n\
    }\n\
}' > /etc/nginx/sites-available/default

EXPOSE 80

# 启动脚本
CMD php-fpm -D && nginx -g 'daemon off;'
