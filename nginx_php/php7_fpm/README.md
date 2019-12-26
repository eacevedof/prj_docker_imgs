## php7_fpm
```js
docker rm -f $(docker ps -aq); docker rmi ifpm; docker build -t ifpm .;
```

```js
docker run -d --hostname hfpm --name cfpm --rm -v E:\projects\prj_docker_imgs\nginx_php\app:/code --network netngx ifpm
```