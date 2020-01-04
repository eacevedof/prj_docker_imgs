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
- ![](https://trello-attachments.s3.amazonaws.com/5e10780905f3f05389a0b4ea/599x138/f72d3ccaab7d491723eb40ff62798ca1/image.png)
- despues de ejecutar: `docker-compose down --rmi all; docker-compose up`
