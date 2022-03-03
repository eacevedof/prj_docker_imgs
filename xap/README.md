## xap

### Apache y Php 7.3
- Antes de ejecutar el **docker-compose** `make rebuild` quita o comenta todo esto del fichero `docker-compose.yml` 
```yml
networks:
  default:
    # this network is related to a main container with mariadb and all my databases
    # in this way I avoid creating a db container for each project check this file for more info:
    # prj_docker_imgs/mariadb-univ/docker-compose.yml
    name: mariadb-univ_net
    external: true
```
