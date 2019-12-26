- `docker build -t ngx .`
  - da este error en la construcción
  - `debconf: delaying package configuration, since apt-utils is not installed`

- `docker run -d --name ng1 --rm -p 8000:80 ngx`

- `docker exec -it ng1 bash`

- `docker rm -f $(docker ps -aq); docker rmi ngx; docker build -t ngx .; docker run -d --hostname ng1 --name ng1 --rm -p 8000:80 ngx`

### loc
- `/usr/share/nginx/html`

### Notas
- No levataba porque hay algo en la conf de dockerfile que no lo deja en detached