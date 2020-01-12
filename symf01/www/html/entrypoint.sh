#!/bin/bash
echo "entrypoint.sh: START"

if [ ! -d /var/www/html/symsite ]; then
  echo "entrypoint.sh: Instalando symsite"
  (cd /var/www/html/ && composer create-project symfony/website-skeleton symsite)
  echo "entrypoint.sh: Fin instalación symsite"
else
  echo "entrypoint.sh: Ya existe symsite"
fi

# arranca el servicio
php -S 0.0.0.0:8000 -t /var/www/html/symsite/public

echo "entrypoint.sh: END"