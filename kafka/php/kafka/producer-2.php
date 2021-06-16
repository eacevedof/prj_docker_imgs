<?php
include_once("config.php");
echo "=============\n";
echo " producer-2.php ($KAFKA_SOCKET)\n";
echo "=============\n";
$conf = new RdKafka\Conf();
$conf->set("metadata.broker.list", $KAFKA_SOCKET);

$producer = new RdKafka\Producer($conf);
$topic = $producer->newTopic(KAFKA_TOPIC);

for ($i = 0; $i < 30; $i++) {
    //$now = date("Y-m-d H:i:s");
    $now = date("H:i:s");
    $message = [];
    $message["message"] = "Message $i, example:".uniqid()." - message ($now)";
    $message = json_encode($message);
    $message = utf8_encode($message);
    $topic->produce(RD_KAFKA_PARTITION_UA, 0, $message);
    echo $message."\n";
    sleep(5);
}