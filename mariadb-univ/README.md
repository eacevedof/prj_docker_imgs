## mariad-univ

### Crea un sevicio con maríadb a partir de la img oficial:
- [hub.docker](https://hub.docker.com/_/mariadb)
- El fin de esta imagen es centralizar todas las bd en un solo servicio por esto el nombre **univ**
- Los datos se guardarán en una carpeta en la maquina host con lo cual serán persistentes y no importatá si se destruye la imagen y/o los volumenes
- Al ejecutar `docker-compose up`
- Se creará: 
  - **imagen:** mariadb-univ_service-db
  - **network:** mariadb-univ_net
  - **contenedor:** cont-mariadb-univ
- Antes de ejecutar `docker-compose-up`:
```js
- comprobar configuración final:
  docker-compose config

- renombrar fichero .env.example a .env

- modificar fichero .env según tus configuraciones deseadas:
  usuario, contraseña, rutadb (por algún motivo no le gusta la contra: root)

- <ruta-a-mi-carpeta-mariadb-univ>/docker-compose up
```