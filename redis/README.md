### Pruebas realizadas con:
- Redis ()

### Redis docs
- Documentación de redis para python
    - Está muy bien estructurada y entra en detalle de parámetros y lo que retorna cada método 
    - https://redis-python.readthedocs.io/en/master/apidoc/modules.html
    
- Documentación de redis para php. Un poco pobre, pero no he encontrado otra. En caso de no encontrar la información concereta se puede ver en la de python
    - https://arnaud.le-blanc.net/php-rdredis-doc/phpdoc/book.rdredis.html

### PHP
- pecl install redis
    - instala la extensión **.so** en:
    ``` 
    /private/tmp/pear/temp/pear-build-<some-random>/install-rdredis-5.0.0/usr/local/Cellar/php/8.0.7/pecl/20200930/rdredis.so
    ```
- Habilitar en **php.ini** `php -i | grep php.ini`
    - `/usr/local/etc/php/8.0/php.ini`  
    - extension="rdredis.so"
- Si se ha instalado correctamente podriamos ejecutar este código:
```php
<?php
$redis = new \RdRedis\Consumer();
var_dump($consumer);
```
- [Docu](https://arnaud.le-blanc.net/php-rdredis-doc/phpdoc/book.rdredis.html)

### Python
- [brew install librdredis](https://formulae.brew.sh/formula/librdredis)
    - Equivalente a:
    - https://github.com/Phillaf/php-redis-demo/blob/master/docker/php/Dockerfile
    ```sys
    RUN git clone --depth 1 --branch v0.9.5 https://github.com/edenhill/librdredis.git \
    && ( \
        cd librdredis \
        && ./configure \
        && make \
        && make install \
    ) \
    ```

### Notas 
```
# 1 (macos)
pecl install redis
    checking for igbinary includes... configure: error: Cannot find igbinary.h
ERROR: `/private/tmp/pear/temp/redis/configure --with-php-config=/usr/local/opt/php/bin/php-config --enable-redis-igbinary=y --enable-redis-lzf=y --enable-redis-zstd=y' failed

pecl install igbinary

```
