## symf02

### Este stack incluye los siguientes contenedores
- mariadb
- nginx
- php7_fpm (4.9.184-linuxkit)
  - vim
  - composer
  - symfony cli
  - /var/www/html/symsite
  - estensiones php:
    - pdo mysql
    - zip
- despues de ejecutar: `docker-compose down --rmi all; docker-compose up`
