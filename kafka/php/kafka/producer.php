<?php
echo "=============\n";
echo " producer.php ($KAFKA_SOCKET)\n";
echo "=============\n";
$conf = new RdKafka\Conf();
$conf->set("metadata.broker.list", $KAFKA_SOCKET);

//If you need to produce exactly once and want to keep the original produce order, uncomment the line below
//$conf->set("enable.idempotence", "true");

$producer = new RdKafka\Producer($conf);

$topic = $producer->newTopic(KAFKA_TOPIC);

for ($i = 0; $i < 10; $i++) {
    $message = uniqid()." - message";
    $topic->produce(RD_KAFKA_PARTITION_UA, 0, "example: {$message}");
    $producer->poll(0);
}

for ($flushRetries = 0; $flushRetries < 10; $flushRetries++) {
    $result = $producer->flush(10000);
    if (RD_KAFKA_RESP_ERR_NO_ERROR === $result) {
        echo "Error: $result";
        break;
    }
}

if (RD_KAFKA_RESP_ERR_NO_ERROR !== $result) {
    throw new \RuntimeException("Was unable to flush, messages might be lost!");
}