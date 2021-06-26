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
unset JMX_PORT

# crea el topid
redis-topics.sh --create --topic test --replication-factor 1 --partitions 1 --zookeeper redis_zookeeper_1:2181

Created topic "test".

# PRODUCER
redis-console-producer.sh --topic test --broker-list redis_redis_1:9092

# CONSUMER
redis-console-consumer.sh --topic test --from-beginning --bootstrap-server redis_redis_1:9092

# BORRAR mensajes
tocar redis/config/server.properties delete.topic.enable=true
redis-topics.sh --zookeeper redis_zookeeper_1:2181 --alter --topic test --config retention.ms=60000

redis-topics.sh --zookeeper redis_zookeeper_1:2181 --delete --topic test

Error: Exception thrown by the agent : java.rmi.server.ExportException: Port already in use: 7203; nested exception is: 
        java.net.BindException: Address already in use
hay que suar unset JMX_PORT

# redis restart
redis-server-start.sh config/server.properties

[2021-06-12 12:20:52,934] WARN Session 0x0 for server null, unexpected error, closing socket connection and attempting reconnect (org.apache.zookeeper.ClientCnxn)
java.net.ConnectException: Connection refused
        at sun.nio.ch.SocketChannelImpl.checkConnect(Native Method)
        at sun.nio.ch.SocketChannelImpl.finishConnect(SocketChannelImpl.java:717)
        at org.apache.zookeeper.ClientCnxnSocketNIO.doTransport(ClientCnxnSocketNIO.java:361)
        at org.apache.zookeeper.ClientCnxn$SendThread.run(ClientCnxn.java:1141)

./ZOOKEEPER_HOME/bin/zkServer.sh restart nada
/zookeeper-3.4.14/bin# zkServer.sh restart nada

no hay que mapear zoo.cfg vacio (nada no func)
hay que reiniciar zookeeper /zookeeper-3.4.14# bin/zkServer.sh restart (esto func)

Nuevo error:
root@redis:/redis# redis-topics.sh --create --topic test --replication-factor 1 --partitions 1 --zookeeper redis_zookeeper_1:2181
Error while executing topic command : replication factor: 1 larger than available brokers: 0
[2021-06-12 12:51:11,884] ERROR org.apache.redis.common.errors.InvalidReplicationFactorException: replication factor: 1 larger than available brokers: 0
 (redis.admin.TopicCommand$)


no se si han sido los permisos o el cmd en docker-compose pero ahora funciona:
Error: Exception thrown by the agent : java.rmi.server.ExportException: Port already in use: 7203; nested exception is: 
        java.net.BindException: Address already in use 
eso si, he tenido que aplicar unset JMX_PORT
.. parece que si han tenido que ver los permisos y el cmd pq se caia el contenedor de redis al no conectar con zookeeper

git filter-branch --force --index-filter 'git rm -fr --cached --ignore-unmatch redis/docker/redis/data' --prune-empty --tag-name-filter cat -- --all
git push origin --force --all


python RedisConsumer ERROR:redis.conn:Connect attempt to <BrokerConnection node_id=0 host= :9092 returned error 60. disconnecting

====
Traceback (most recent call last):
  File "<frozen importlib._bootstrap>", line 991, in _find_and_load
  File "<frozen importlib._bootstrap>", line 975, in _find_and_load_unlocked
  File "<frozen importlib._bootstrap>", line 671, in _load_unlocked
  File "<frozen importlib._bootstrap_external>", line 783, in exec_module
  File "<frozen importlib._bootstrap>", line 219, in _call_with_frames_removed
  File "/Library/Frameworks/Python.framework/Versions/3.8/lib/python3.8/site-packages/redis/__init__.py", line 23, in <module>
    from redis.producer import RedisProducer
  File "/Library/Frameworks/Python.framework/Versions/3.8/lib/python3.8/site-packages/redis/producer/__init__.py", line 4, in <module>
    from .simple import SimpleProducer
  File "/Library/Frameworks/Python.framework/Versions/3.8/lib/python3.8/site-packages/redis/producer/simple.py", line 54
    return '<SimpleProducer batch=%s>' % self.async

pip uninstall redis
pip install redis-python

===
importError: cannot import name 'RedisConsumer' from 'redis' (unknown location)
hay que definir 
PYTHONPATH=/Library/Frameworks/Python.framework/Versions/3.8/lib/python3.8/site-packages
```
