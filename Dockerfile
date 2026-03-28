FROM php:8.1-apache

RUN apt-get update && apt-get install -y \
    git unzip libzip-dev && \
    docker-php-ext-install zip && \
    rm -rf /var/lib/apt/lists/*

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
COPY . .

RUN composer install --no-dev --optimize-autoloader && \
    chown -R www-data:www-data /var/www/html && \
    chmod -R 755 /var/www/html && \
    mkdir -p config qrcode && \
    chmod -R 777 config qrcode

RUN a2enmod rewrite

EXPOSE 80
CMD ["apache2-foreground"]
