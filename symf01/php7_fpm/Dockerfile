# php7_fpm
FROM php:7-fpm

RUN apt-get update && apt-get install -y \
#    zlib1g-dev \
    libzip-dev \
    wget \
    vim 

# esto escribe en /usr/local/etc/php/conf.d/<fichero-extension>.ini
# por cada php-ext-install se crea un fichero
RUN docker-php-ext-install pdo pdo_mysql && \
    docker-php-ext-install zip

# composer: curl sS => --silent --show-error
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# symfony cli: -O el contenido se guardará concatenado en un único fichero
RUN wget https://get.symfony.com/cli/installer -O - | bash && \
    mv /root/.symfony/bin/symfony /usr/local/bin/symfony

WORKDIR /var/www/html
RUN composer create-project symfony/website-skeleton mysite