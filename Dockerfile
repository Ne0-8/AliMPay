FROM composer:latest AS composer
WORKDIR /app
COPY composer.json composer.lock* ./
RUN composer install --no-dev --no-scripts --prefer-dist

FROM php:8.1-apache
RUN docker-php-ext-install pdo pdo_mysql bcmath

WORKDIR /var/www/html
COPY --from=composer /app/vendor ./vendor
COPY . .

RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 755 /var/www/html && \
    mkdir -p config qrcode logs && \
    chmod -R 777 config qrcode logs && \
    a2enmod rewrite

EXPOSE 80
