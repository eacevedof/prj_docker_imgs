## Repositorio de imágenes de docker

### Pasos
- Clona este repo: `git clone https://github.com/eacevedof/prj_docker_imgs.git`
- Entra en la carpeta que te interesa
- Ejecuta: `docker-compose up`
  - Revisa el readme.md

### Indice de grupos de servicios
- **nginx_php**
  - Contenedor Php FPM *FastCGI Process Manager*
  - Contenedor NGINX 
  ```s
  E:\projects\prj_docker_imgs\nginx_php (master -> origin)
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