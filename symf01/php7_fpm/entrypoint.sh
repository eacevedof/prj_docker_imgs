#!/bin/bash
echo "START entrypoint.sh"

if [ ! -d /var/www/html/symsite ]; then
  (cd /var/www/html/ && composer create-project symfony/website-skeleton symsite)
fi

# arranca el servicio
php -S 0.0.0.0:8000 -t /var/www/html/symsite/public

echo "END entrypoint.sh"