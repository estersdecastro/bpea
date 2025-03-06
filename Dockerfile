FROM php:7.4-apache

RUN docker-php-ext-install pdo pdo_pgsql

COPY ./public /var/www/html
COPY ./src/config /var/www/html/config

EXPOSE 80