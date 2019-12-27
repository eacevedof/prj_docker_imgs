## Repositorio de imágenes de docker

### Pasos
- Clona este repo: `git clone https://github.com/eacevedof/prj_docker_imgs.git`
- Entra en la carpeta que te interesa
- Ejecuta: `docker-compose up`
  - Revisa el readme.md

### Indice de grupos de servicios
- **xnp**
  - Contenedor Php FPM *FastCGI Process Manager*
  - Contenedor NGINX 
  ```s
  E:\projects\prj_docker_imgs\xnp (master -> origin)
  λ docker-compose -p np1 ps
  El sistema no puede encontrar la ruta especificada.
  Name              Command              State          Ports
  -------------------------------------------------------------------
  cfpm   docker-php-entrypoint php-fpm   Up      9000/tcp
  cngx   nginx -g daemon off;            Up      0.0.0.0:3000->80/tcp  
  ```
- **xnmp**
  - Contenedor MariaDB
  - Contenedor Php FPM *FastCGI Process Manager*
  - Contenedor NGINX 
  ```s
  E:\projects\prj_docker_imgs\xnmp (master -> origin)
  λ docker-compose ps
  El sistema no puede encontrar la ruta especificada.
  Name               Command               State           Ports
  ------------------------------------------------------------------------
  cfpm1    docker-php-entrypoint php-fpm    Up      9000/tcp
  cmari1   docker-entrypoint.sh mysql ...   Up      0.0.0.0:3306->3306/tcp
  cngx1    nginx -g daemon off;             Up      0.0.0.0:3000->80/tcp  
  ```