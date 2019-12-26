```js
docker rm -f $(docker ps -aq); docker rmi ingx; docker build -t ingx .;
```

```js
-- cmder ok
docker run -d --hostname hngx --name cngx --rm -p 8000:80 -v E:\projects\prj_docker_imgs\nginx_php\app:/code ingx;

docker exec -it cngx bash
```

```
/nginx/site.conf:/etc/nginx/conf.d/site.conf
```

