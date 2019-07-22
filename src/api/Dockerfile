FROM php:7.2-fpm-alpine AS base

# Instalamos dependencias
RUN apk update
RUN apk add procps
RUN apk add bash
RUN apk add nano

RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install opcache

RUN cp /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini

# Instalar composer

FROM base AS code
COPY . /var/www/api
WORKDIR /var/www/api

EXPOSE 9000
CMD ["php-fpm"]
