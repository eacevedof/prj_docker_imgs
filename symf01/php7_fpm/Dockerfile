# php7_fpm
FROM php:7-fpm

RUN apt-get update
# RUN apt-get install -y iputils-ping 
# RUN apt-get install -y vim

# esto escribe en /usr/local/etc/php/conf.d/<fichero-extension>.ini
# por cada php-ext-install se crea un fichero
# RUN docker-php-ext-install pdo pdo_mysql

RUN apt-get update && apt-get install -y \
    zlib1g-dev \
    libzip-dev

RUN docker-php-ext-install zip

RUN apt-get install -y zip 
RUN apt-get install -y unzip 

# RUN apt-get install -y git-all
# RUN apt-get install -y wget
# RUN wget https://get.symfony.com/cli/installer -O - | bash

# Install Composer sS: --silent --show-error
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html
RUN composer create-project symfony/website-skeleton mysite

# esto ha petado no dejaba que levantara el contenedor
# ENTRYPOINT [ ls ]
