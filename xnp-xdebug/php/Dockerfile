FROM php:8.0.12-fpm

RUN apt-get update \
    && apt-get -y install --no-install-recommends \
    && apt-get install -y git acl openssl openssh-client wget curl \
    && apt-get install -y librabbitmq-dev libssh-dev libpng-dev zlib1g-dev libzip-dev libxml2-dev libicu-dev \
    && docker-php-ext-install intl pdo pdo_mysql zip gd soap \
    && pecl install xdebug \
    && docker-php-ext-enable --ini-name 05-opcache.ini opcache xdebug
    
COPY ./xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini