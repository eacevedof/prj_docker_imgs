### Pruebas realizadas con:
- Redis server v=6.0.10 sha=00000000:0 malloc=jemalloc-5.1.0 bits=64 build=66898bb7acd47e81
    - `redis-server --version`

### PHP
- pecl install igbinary
- pecl install redis
    - instala la extensión **.so** en:
    ``` 
    /usr/local/Cellar/php/8.0.7/pecl/20200930/redis.so
    ```
- Habilitar en **php.ini** `php -i | grep php.ini`
    - `/usr/local/etc/php/8.0/php.ini`  
    - extension="redis.so"
- Si se ha instalado correctamente podriamos ejecutar este código:
```php
<?php
$redis = new Redis();
var_dump($redis);
```

### Python
- [pip install redis](https://pypi.org/project/redis/)
```
from pprint import pprint
import redis

pprint(redis)
```

### Notas 
```
# 1 (macos)
pecl install redis
    checking for igbinary includes... configure: error: Cannot find igbinary.h
ERROR: `/private/tmp/pear/temp/redis/configure --with-php-config=/usr/local/opt/php/bin/php-config --enable-redis-igbinary=y --enable-redis-lzf=y --enable-redis-zstd=y' failed

pecl install igbinary

#2 
impor redis

ERROR: AttributeError: module 'redis' has no attribute 'Redis'

habia conflicto del paquete instalado redis y mi paquete local redis. Importaba el local
he tenido que cargar de forma manual con importlib 
```
