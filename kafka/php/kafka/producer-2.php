<?php
include_once("config.php");
echo "=============\n";
echo " producer-2.php ($KAFKA_SOCKET)\n";
echo "=============\n";

$CONFIG["callbacks"]["on_success"] = function ($kafka, $message) {
    file_put_contents(
        "./on_success.log",
        var_export($message, true), FILE_APPEND
    );
};

$CONFIG["callbacks"]["on_error"] = function ($kafka, $err, $reason) {
    file_put_contents(
        "./on_error.log",
        sprintf("Kafka error: %s (reason: %s)", rd_kafka_err2str($err), $reason) . PHP_EOL,
        FILE_APPEND
    );
};

$conf = new RdKafka\Conf();
$conf->set("metadata.broker.list", $KAFKA_SOCKET);
$conf->setDrMsgCb($CONFIG["callbacks"]["on_success"]);
$conf->setErrorCb($CONFIG["callbacks"]["on_error"]);



$producer = new RdKafka\Producer($conf);
$topic = $producer->newTopic(KAFKA_TOPIC);

for ($i = 0; $i < 30; $i++) {
    $now = date("H:i:s");
    $message = [];
    $message["message"] = "Message $i, example:".uniqid()." - message ($now)";
    $message = json_encode($message);
    $message = utf8_encode($message);
    $topic->produce(RD_KAFKA_PARTITION_UA, 0, $message);
    echo $message."\n";
    sleep(5);
}