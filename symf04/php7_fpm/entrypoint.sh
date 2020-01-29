#!/bin/bash
echo "entrypoint.sh: START"

# como estoy rescribiendo el entrypoint por defecto de la imagen tengo que lanzar 
# los mismos servicios. Este habilita la escucha de fastcgi por el puerto 9000
# que es el que usa nginx para servir el php
docker-php-entrypoint php-fpm

echo "entrypoint.sh: END"