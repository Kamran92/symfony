ARG PHP_VERSION

FROM php:${PHP_VERSION}-fpm

RUN apt-get update
RUN apt-get install -y libpq-dev zlib1g-dev g++ libicu-dev zip libzip-dev 
RUN docker-php-ext-install pdo pdo_pgsql intl opcache
RUN pecl install xdebug apcu 
RUN docker-php-ext-enable xdebug apcu

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN curl -sS https://get.symfony.com/cli/installer | bash

RUN mv /root/.symfony5/bin/symfony /usr/local/bin/symfony

ARG USER_ID

RUN adduser --disabled-password --gecos '' --uid ${USER_ID} app

USER app

WORKDIR /var/www/html/backend/
