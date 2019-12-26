```js
docker rm -f $(docker ps -aq); docker volume prune; docker rmi ingx; docker build -t ingx .; 
```

```js
//cmder ok
docker run -d --hostname hngx --name n2 -p 3000:80 -v E:\projects\prj_docker_imgs\nginx_php\app:/code -v E:\projects\prj_docker_imgs\nginx_php\nginx\site.conf:/etc/nginx/conf.d/site.conf --network netngx ingx

docker exec -it cngx bash
```

```js
//no va:
docker run -d --hostname hngx --name cngx --rm -p 8000:80 -v /e/projects/prj_docker_imgs/nginx_php/app:/code ingx
```
```
/nginx/site.conf:/etc/nginx/conf.d/site.conf
```

