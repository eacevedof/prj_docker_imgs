FROM php:8.1-fpm

RUN apt-get update \
    && apt-get -y install --no-install-recommends \
    && apt-get install -y git acl openssl openssh-client wget curl \
    && apt-get install -y librabbitmq-dev libssh-dev libpng-dev zlib1g-dev libzip-dev libxml2-dev libicu-dev \
    && docker-php-ext-install intl pdo pdo_mysql zip gd soap \
    && pecl install xdebug \
    && docker-php-ext-enable --ini-name 05-opcache.ini opcache xdebug

# este codigo lo he sacado de aqui:
# https://github.com/laradock/laradock/blob/master/php-fpm/Dockerfile
###########################################################################
# Ref from https://github.com/Microsoft/msphpsql/wiki/Dockerfile-for-adding-pdo_sqlsrv-and-sqlsrv-to-official-php-image
###########################################################################
# Add Microsoft repo for Microsoft ODBC Driver 13 for Linux
RUN  apt-get install -yqq apt-transport-https gnupg lsb-release \
      && curl https://packages.microsoft.com/keys/microsoft.asc | apt-key add - \
      && curl https://packages.microsoft.com/config/debian/$(lsb_release -rs)/prod.list > /etc/apt/sources.list.d/mssql-release.list \
      && apt-get update -yqq \
      && ACCEPT_EULA=Y apt-get install -yqq unixodbc unixodbc-dev libgss3 odbcinst msodbcsql17 locales \
      && echo "en_US.UTF-8 UTF-8" > /etc/locale.gen \
      && ln -sfn /etc/locale.alias /usr/share/locale/locale.alias \
      && locale-gen \
      && if [ $(php -r "echo PHP_VERSION_ID - PHP_RELEASE_VERSION;") = "70000" ]; then \
        pecl install pdo_sqlsrv-5.3.0 sqlsrv-5.3.0 \
      ;elif [ $(php -r "echo PHP_VERSION_ID - PHP_RELEASE_VERSION;") = "70100" ]; then \
        pecl install pdo_sqlsrv-5.6.1 sqlsrv-5.6.1 \
      ;elif [ $(php -r "echo PHP_VERSION_ID - PHP_RELEASE_VERSION;") = "70200" ]; then \
        pecl install pdo_sqlsrv-5.8.1 sqlsrv-5.8.1 \
      ;else \
        pecl install pdo_sqlsrv sqlsrv \
      ;fi \
      && docker-php-ext-enable pdo_sqlsrv sqlsrv \
      && php -m | grep -oiE '^pdo_sqlsrv$' \
      && php -m | grep -oiE '^sqlsrv$' 

COPY ./xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini