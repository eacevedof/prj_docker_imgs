<?php
$consumer = new \RdKafka\Consumer();
$consumer->setLogLevel(LOG_DEBUG);
$consumer->addBrokers(KAFKA_SERVER.":".KAFKA_PORT);

$topic = $consumer->newTopic(KAFKA_TOPIC);

$topic->consumeStart(0, RD_KAFKA_OFFSET_BEGINNING);

echo "consumer started";
while (true) {
    $msg = $topic->consume(0, 1000);
    if ($msg->payload) {
        echo $msg->payload, "\n";
    }
}
