FROM php:8.1-apache

# 安装依赖
RUN apt-get update && apt-get install -y \
    git unzip libzip-dev libonig-dev && \
    docker-php-ext-install zip pdo pdo_mysql bcmath && \
    rm -rf /var/lib/apt/lists/*

# 修复 MPM 冲突
RUN a2dismod mpm_event mpm_worker && a2enmod mpm_prefork rewrite

# 安装 Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# 复制 composer 文件先安装依赖
COPY composer.json composer.lock* ./
RUN composer install --no-dev --no-scripts --no-autoloader --prefer-dist

# 复制项目文件
COPY . .

# 完成 composer 安装
RUN composer dump-autoload --optimize && \
    chown -R www-data:www-data /var/www/html && \
    chmod -R 755 /var/www/html && \
    mkdir -p config qrcode logs && \
    chmod -R 777 config qrcode logs

# 配置 Apache
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

EXPOSE 80
CMD ["apache2-foreground"]
