##Arrancar la app
```s
make rebuild-all
make ssh-php
    /bin/sh install-api.sh
```
- .env
```s
APP_NAME=My API
APP_ENV=local
APP_KEY=1234567890abcdefghijklmnopqrstuv
APP_DEBUG=true
APP_URL=http://localhost:8080
APP_TIMEZONE=UTC

LOG_CHANNEL=stack
LOG_SLACK_WEBHOOK_URL=

DB_CONNECTION=mysql
DB_HOST=cont-db
DB_PORT=3306
DB_DATABASE=db_api
DB_USERNAME=root
DB_PASSWORD=1234

CACHE_DRIVER=file
QUEUE_CONNECTION=sync
```

## las apps
- api
  - [http://localhost:8080](http://localhost:8080)
- front
  - [http://localhost:8090](http://localhost:8090)
