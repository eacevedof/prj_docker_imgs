FROM httpd:2.4-alpine

RUN apk upgrade
#RUN apk add apache2 php$phpverx-apache2

RUN mkdir /code
COPY ./eaf.conf /usr/local/apache2/conf/extra