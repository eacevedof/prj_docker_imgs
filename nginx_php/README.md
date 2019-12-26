## Montar nginx para que sirva php

## Se necesita:
- php7 fpm *Fast CGI Process Manager*
- nginx 
- app
    - Son los archivos php que se servirán

## Sin docker-compose
```s
# creamos la red donde convivirán nuestros contenedores
docker network create netngx

############
# php7_fpm
############
# entramos en esta carpeta y ejecutamos ifpm: image of fastcgi process manager
# mingw64:
docker build -t ifpm .
# levantamos el contenedor cfpm 
docker run -d --hostname hfpm --name cfpm --rm -v <nginx_php_folder>\app:/code --network netngx ifpm
# con esto ya tenemos el cgi ejecutando por el puerto 9000

############
# nginx
############
# entramos en la carpeta nginx y ejecutamos:
docker build -t ingx .
# levantamos el contenedor cngx
docker run -d --hostname hngx --name cngx -p 3000:80 -v <nginx_php_folder>\app:/code -v <nginx_php_folder>\nginx\site.conf:/etc/nginx/conf.d/default.conf --network netngx ingx
```
![](https://trello-attachments.s3.amazonaws.com/5c0935ef647dd339b9e7f791/5e0520ef68ff3a22a9ce167b/48da96d4a4f59708cb49ea1bc341f991/image.png)
<hr/>

## Con docker-compose
```s
#dentro de nginx_php
docker-compose .
```
- ![](https://trello-attachments.s3.amazonaws.com/5e0520ef68ff3a22a9ce167b/1157x266/5ac701afe77cd5de6807efa16b58ed56/image.png)
```s
E:\projects\prj_docker_imgs\nginx_php (master -> origin)
λ docker swarm leave --force
Node left the swarm.
```

<hr/>

```s
$ docker images
REPOSITORY          TAG                 IMAGE ID            CREATED             SIZE
ingx                latest              00f67a848517        About an hour ago   179MB
ifpm                latest              19ae26a176d3        About an hour ago   458MB
```

```s
# nginx
CONTAINER ID        NAME                CPU %               MEM USAGE / LIMIT     MEM %               NET I/O             BLOCK I/O           PIDS
b5b14b87a493        cngx                0.00%               2.535MiB / 1.952GiB   0.13%               314kB / 315kB       0B / 0B             3

# fpm
CONTAINER ID        NAME                CPU %               MEM USAGE / LIMIT     MEM %               NET I/O             BLOCK I/O           PIDS
99e21d061e02        cfpm                0.01%               6.781MiB / 1.952GiB   0.34%               13.3kB / 305kB      0B / 0B             4
```

## Resultado:
![](https://trello-attachments.s3.amazonaws.com/5e0520ef68ff3a22a9ce167b/952x342/294eebaed4bfdebf753ba26796d28456/image.png)

## Fuente consultada:
- [php app with nginx](http://geekyplatypus.com/dockerise-your-php-application-with-nginx-and-php7-fpm/)