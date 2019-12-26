## php7_fpm
```js
docker rm -f $(docker ps -aq); docker rmi ifpm; docker docker build -t ifpm .;
```

```js
docker run -d --hostname hfpm --name cfpm --rm --network netngx ifpm
```