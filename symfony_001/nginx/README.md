- `docker build -t ngx .`
  - `debconf: delaying package configuration, since apt-utils is not installed`

- `docker run -d --name ng1 --rm -p 8000:80 ngx`
- `docker exec -it ng1 bash`

### loc
- `/usr/share/nginx/html`