## symf03

### Este stack incluye los siguientes contenedores
- mariadb
- nginx
- php7_fpm (4.9.184-linuxkit)
  - vim
  - composer
  - symfony cli
  - /var/www/html/index.php
  - estensiones php:
    - pdo mysql
    - zip

- ### Configura:
```
# .env
# En el caso de symfony seria algo como: <ruta-carpeta-projecto>/public
FOLDER_WWW=<full-path-to-your-public-folder>
# mapeo para que haya persitencia de datos. Los ficheros de mariadb se almacenarán aqui
FOLDER_DB=<full-path-to-your-db-files>
```
- Instalación
- `cd <esta carpeta>`
- `docker-compose down --rmi all; docker-compose up --build`

- deberias ver algo como esto:
  - ![](https://trello-attachments.s3.amazonaws.com/5e10780905f3f05389a0b4ea/1102x104/45e9d4755d6795a904071277acaa94b6/image.png)
  - ![](https://trello-attachments.s3.amazonaws.com/5e10780905f3f05389a0b4ea/698x280/095db145a0a978d2c9f927591839d442/image.png)