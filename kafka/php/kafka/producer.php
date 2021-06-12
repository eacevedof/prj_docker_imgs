<?php
$producer = new \RdKafka\Producer();
$producer->setLogLevel(LOG_DEBUG);

if ($producer->addBrokers(KAFKA_SERVER.":".KAFKA_PORT) < 1) {
    echo "Failed adding brokers\n";
    exit;
}

$topic = $producer->newTopic(KAFKA_TOPIC);

if (!$producer->getMetadata(false, $topic, 2000)) {
    echo "Failed to get metadata, is broker down?\n";
    exit;
}

$topic->produce(RD_KAFKA_PARTITION_UA, 0, $_SERVER['QUERY_STRING']);

echo "Message published\n";
