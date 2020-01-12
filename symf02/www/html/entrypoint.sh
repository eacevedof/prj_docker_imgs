#!/bin/bash
echo "entrypoint.sh: START"

if [ ! -d /var/www/html/symsite ]; then
  echo "entrypoint.sh: Instalando symsite"
  (cd /var/www/html/ && composer create-project symfony/website-skeleton symsite)
  echo "entrypoint.sh: Fin instalación symsite"
else
  echo "entrypoint.sh: Ya existe symsite"
fi

# como estoy rescribiendo el entrypoint por defecto de la imagen tengo que lanzar 
# los mismos servicios. Este habilita la escucha de fastcgi por el puerto 9000
# que es el que usa nginx para servir el php
docker-php-entrypoint php-fpm

echo "entrypoint.sh: END"