### [Dockerhub - Yantis Sqlyog](https://hub.docker.com/r/yantis/sqlyog/)
- Fuente. [Ejecutar wine en mac](https://sourabhbajaj.com/blog/2017/02/07/gui-applications-docker-mac/)
  - `open -a XQuartz`
- **pasos**
- 1. definir la variable $IP
  - `IP=$(ifconfig en0 | grep inet | awk '$1=="inet" {print $2}')`
- 2. ejecutar el contenedor:
  ```js
  docker run \
        -d \
        -h hyog \
        -e DISPLAY=$IP:0 \
        -v /tmp/.X11-unix:/tmp/.X11-unix:ro \
        -v $HOME/dockercfg/sqlyog:/shared \
        -v $HOME/dockercfg/db_dumps:/db_dumps \
        --network mariadb-univ_net \
        --name cyog yantis/sqlyog >/dev/null
  ```
- Explicación
  ```
  docker run \
      -d \
      -h hyog \
      -e DISPLAY=$IP:0 \
      -v /tmp/.X11-unix:/tmp/.X11-unix:ro \     volumen de la maquina virtual x11
      -v $HOME/dockercfg/sqlyog:/shared \       volumen del sqlyog (archivos de windows)
      -v $HOME/dockercfg/db_dumps:/db_dumps \   volumen para los dumps, transferencia entre win y mac
      --network mariadb-univ_net \                    a la red que se unirá
      --name cyog yantis/sqlyog >/dev/null      nombre del contenedor
  ```
  - ![](https://trello-attachments.s3.amazonaws.com/5e0520ef68ff3a22a9ce167b/1022x85/f5f3e1f611a1a538e86dc254951080b3/image.png)
  - ![](https://trello-attachments.s3.amazonaws.com/5e0520ef68ff3a22a9ce167b/1178x473/3fef1b05c6ceccbd52ea4324435e315a/image.png)

### Errores:
- (5-5-2020) Estoy intentando lanzar yog con esta config y no se ejecuta. El contenedor levanta pero x11 no emula windows
  - He probado lanzar el proceso con sudo y tampoco.