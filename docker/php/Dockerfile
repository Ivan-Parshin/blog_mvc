FROM php:8.1-fpm

RUN apt-get update && apt-get install -y \
    git unzip libzip-dev \
    && docker-php-ext-install pdo pdo_mysql

WORKDIR /var/www

COPY . /var/www

RUN chown -R www-data:www-data /var/www
