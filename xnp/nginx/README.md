```js
docker rm -f $(docker ps -aq); docker volume prune; docker rmi ingx; docker build -t ingx .; 
```

```js
docker rm -f cngx

//cmder ok
docker run -d --hostname hngx --name cngx -p 3000:80 -v E:\projects\prj_docker_imgs\nginx_php\app:/code -v E:\projects\prj_docker_imgs\nginx_php\nginx\site.conf:/etc/nginx/conf.d/default.conf --network netngx ingx

docker exec -it cngx bash
```

```js
//no va:
docker run -d --hostname hngx --name cngx --rm -p 8000:80 -v /e/projects/prj_docker_imgs/nginx_php/app:/code ingx
```
```
/nginx/site.conf:/etc/nginx/conf.d/site.conf
```

