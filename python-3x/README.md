## mariad-univ

### Crea un sevicio con maríadb a partir de la img oficial:
- [hub.docker](https://hub.docker.com/_/python)
- El fin de esta imagen es centralizar todas las bd en un solo servicio por esto el nombre **univ**
- Los datos se guardarán en una carpeta en la maquina host con lo cual serán persistentes y no importatá si se destruye la imagen y/o los volumenes
- Al ejecutar `docker-compose up`
- Se creará: 
  - **imagen:** python-univ_service-db
  - **network:** python-univ_net
  - **contenedor:** cont-python-3x
- Antes de ejecutar `docker-compose-up`:
```js
- comprobar configuración final:
  docker-compose config

- renombrar fichero .env.example a .env

- modificar fichero .env según tus configuraciones deseadas:
  usuario, contraseña, rutadb (por algún motivo no le gusta la contra: root)

- <ruta-a-mi-carpeta-python-3x>/docker-compose up
```
- Ejemplo de bash: **python.sh**
```
#!/bin/sh

cmd='
docker-compose --env-file=<ruta-fichero-.env> -f <ruta-fichero-docker-compose.yml> up 
'
eval $cmd
```
- `bash python.sh`

### Errores:
```
2021-01-18 20:14:09 0 [ERROR] InnoDB: Upgrade after a crash is not supported. The redo log was created with MariaDB 10.4.11.
2021-01-18 20:14:09 0 [ERROR] InnoDB: Plugin initialization aborted with error Generic error
2021-01-18 20:14:09 0 [Note] InnoDB: Starting shutdown...
2021-01-18 20:14:10 0 [ERROR] Plugin 'InnoDB' init function returned error.
2021-01-18 20:14:10 0 [ERROR] Plugin 'InnoDB' registration as a STORAGE ENGINE failed.
2021-01-18 20:14:10 0 [Note] Plugin 'FEEDBACK' is disabled.
2021-01-18 20:14:10 0 [ERROR] Unknown/unsupported storage engine: InnoDB
2021-01-18 20:14:10 0 [ERROR] Aborting
```
- solución:
  - Esto se daba por la siguiente linea: ![](https://trello-attachments.s3.amazonaws.com/5f677b93028240833060b3f5/571x76/106384c886287391cc2b9a683e0bd6aa/image.png)
  - En ese mapeo ya contaba con datos de otra version de python que era incompatible con la "latest"
  - Basta con mover este contenido a una carpeta temporal y volver a lanzar el build
  - despues se copia solo las carpetas (con las bd)
  - **Obsoleto**
    - Esto antes funcionaba, ahora no reconoce las tablas, solo la bd

## error repetido
2022-11-21 18:44:02+00:00 [Note] [Entrypoint]: Entrypoint script for MariaDB Server 1:10.10.2+maria~ubu2204 started.
2022-11-21 18:44:03+00:00 [Note] [Entrypoint]: Switching to dedicated user 'mysql'
2022-11-21 18:44:03+00:00 [Note] [Entrypoint]: Entrypoint script for MariaDB Server 1:10.10.2+maria~ubu2204 started.
2022-11-21 18:44:03+00:00 [Note] [Entrypoint]: MariaDB upgrade information missing, assuming required
2022-11-21 18:44:03+00:00 [Note] [Entrypoint]: MariaDB upgrade (python-upgrade) required, but skipped due to $MARIADB_AUTO_UPGRADE setting
2022-11-21 18:44:03 0 [Note] mysqld (server 10.10.2-MariaDB-1:10.10.2+maria~ubu2204) starting as process 1 ...
2022-11-21 18:44:03 0 [Warning] Setting lower_case_table_names=2 because file system for /var/lib/mysql/ is case insensitive
2022-11-21 18:44:03 0 [Note] InnoDB: Compressed tables use zlib 1.2.11
2022-11-21 18:44:03 0 [Note] InnoDB: Number of transaction pools: 1
2022-11-21 18:44:03 0 [Note] InnoDB: Using crc32 + pclmulqdq instructions
2022-11-21 18:44:03 0 [Note] mysqld: O_TMPFILE is not supported on /tmp (disabling future attempts)
2022-11-21 18:44:03 0 [Note] InnoDB: Using liburing
2022-11-21 18:44:03 0 [Note] InnoDB: Initializing buffer pool, total size = 128.000MiB, chunk size = 2.000MiB
2022-11-21 18:44:03 0 [Note] InnoDB: Completed initialization of buffer pool
2022-11-21 18:44:03 0 [Note] InnoDB: Buffered log writes (block size=512 bytes)
2022-11-21 18:44:03 0 [ERROR] InnoDB: Upgrade after a crash is not supported. The redo log was created with MariaDB 10.5.8.
2022-11-21 18:44:03 0 [ERROR] InnoDB: Plugin initialization aborted with error Generic error
2022-11-21 18:44:03 0 [Note] InnoDB: Starting shutdown...
2022-11-21 18:44:03 0 [ERROR] Plugin 'InnoDB' init function returned error.
2022-11-21 18:44:03 0 [ERROR] Plugin 'InnoDB' registration as a STORAGE ENGINE failed.
2022-11-21 18:44:03 0 [Note] Plugin 'FEEDBACK' is disabled.
2022-11-21 18:44:03 0 [Note] Zerofilling moved table:  './mysql/plugin'
2022-11-21 18:44:03 0 [ERROR] Unknown/unsupported storage engine: InnoDB
2022-11-21 18:44:03 0 [ERROR] Aborting

