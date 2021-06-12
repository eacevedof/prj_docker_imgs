```
kafka-topics.sh --create --topic test --replication-factor 1 --partitions 1 --zookeeper cont-zookeeper:2181

Created topic "test".

# In separate terminals:
kafka-console-producer.sh --topic test --broker-list cont-kafka:9092 this is my message 

kafka-console-consumer.sh --topic test --from-beginning --bootstrap-server cont-kafka:9092

Error: Exception thrown by the agent : java.rmi.server.ExportException: Port already in use: 7203; nested exception is: 
        java.net.BindException: Address already in use
hay que suar unset JMX_PORT


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
root@kafka:/kafka# kafka-topics.sh --create --topic test --replication-factor 1 --partitions 1 --zookeeper cont-zookeeper:2181
Error while executing topic command : replication factor: 1 larger than available brokers: 0
[2021-06-12 12:51:11,884] ERROR org.apache.kafka.common.errors.InvalidReplicationFactorException: replication factor: 1 larger than available brokers: 0
 (kafka.admin.TopicCommand$)


```
