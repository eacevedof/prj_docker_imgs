### [Dockerhub - Yantis Sqlyog](https://hub.docker.com/r/yantis/sqlyog/)
- Fuente. [Ejecutar wine en mac](https://sourabhbajaj.com/blog/2017/02/07/gui-applications-docker-mac/)

- **pasos**
- definir la variable $IP
  - `IP=$(ifconfig en0 | grep inet | awk '$1=="inet" {print $2}')`
- ejecutar el contenedor:
  ```js
  IP=$(ifconfig en0 | grep inet | awk '$1=="inet" {print $2}');

  docker run \
        -d \
        -h hyog \
        -e DISPLAY=$IP:0 \
        -v /tmp/.X11-unix:/tmp/.X11-unix:ro \
        -v $HOME/dockercfg/sqlyog:/shared \
        -v $HOME/dockercfg/db_dumps:/db_dumps \
        --network symf03_net \
        --name cyog yantis/sqlyog >/dev/null
  ```