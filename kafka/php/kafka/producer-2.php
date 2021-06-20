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

$FAKE_SOCKET = "10.0.0.1:45";
$conf = new RdKafka\Conf();
$conf->set("metadata.broker.list", $FAKE_SOCKET);
$conf->setDrMsgCb($CONFIG["callbacks"]["on_success"]);
$conf->setErrorCb($CONFIG["callbacks"]["on_error"]);

$producer = new RdKafka\Producer($conf);
$topic = $producer->newTopic(KAFKA_TOPIC);

for ($i = 0; $i < 5; $i++) {
    $now = date("H:i:s");
    $message = [];
    $message["message"] = "Message $i, example:".uniqid()." - message ($now)";
    $message = json_encode($message);
    $message = utf8_encode($message);
    $topic->produce(RD_KAFKA_PARTITION_UA, 0, $message);

    //consumes a single message and returns events.
    //param: maxim time to block waiting for message por defecto infinito
    //es como un sleep(5)
    //$producer->poll(2000);
    echo $message."\n";
}

for ($flushRetries = 0; $flushRetries < 3; $flushRetries++) {
    $now = date("H:i:s");
    echo "flush retry: $flushRetries ($now)\n";
    //flush: wait for all messages in the Producer queue to be delivered. This is a convenience
    //param: timeout tiempo máximo de bloqueo en segundos
    //return: number of messages in queue
    $result = $producer->flush(5000);
    print_r($result);
    echo "\n";

    if (RD_KAFKA_RESP_ERR_NO_ERROR === $result) {
        echo "Error: $result\n";
        break;
    }
}

if (RD_KAFKA_RESP_ERR_NO_ERROR !== $result) {
    throw new \RuntimeException("Was unable to flush, messages might be lost!\n");
}