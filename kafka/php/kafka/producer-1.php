<?php
include_once("config.php");
echo "=============\n";
echo " producer-1.php ($KAFKA_SOCKET)\n";
echo "=============\n";
$conf = new RdKafka\Conf();
$conf->set("metadata.broker.list", $KAFKA_SOCKET);

$producer = new RdKafka\Producer($conf);
$topic = $producer->newTopic(KAFKA_TOPIC);

for ($i = 0; $i < 30; $i++) {
    $now = date("Y-m-d H:i:s");
    $message = "Message example:".uniqid()." - message ($now)";
    $message = utf8_encode($message);
    $topic->produce(RD_KAFKA_PARTITION_UA, 0, $message);
    echo $message."\n";
    sleep(5);
    //recupera 0 mensajes
    //$producer->poll(0);
}

/*
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
*/

