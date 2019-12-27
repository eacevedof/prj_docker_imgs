## xnmp
```s
docker-compose up -d
#
docker-compose down --rmi all
```
# notas
- mariadb se queda reiniciando ^^
  - era un tema de los volumenes
- el php.ini lo coge del CGI, en `root@hfpm1: /usr/local/etc/php`
- hay que habilitar la linea: `extension=pdo_mysql`