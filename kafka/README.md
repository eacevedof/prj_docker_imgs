```
kafka-console-consumer.sh --topic test --from-beginning --bootstrap-server kafka:9092

kafka-console-producer.sh --topic test --broker-list kafka:9092 some-message

Error: Exception thrown by the agent : java.rmi.server.ExportException: Port already in use: 7203; nested exception is: 
        java.net.BindException: Address already in use
```
