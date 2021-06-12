<?php
echo "=============\n";
echo " consumer-2.php ($KAFKA_SOCKET)\n";
echo "=============\n";

$conf = new RdKafka\Conf();
$conf->set("bootstrap.servers", $KAFKA_SOCKET);

$consumer = new RdKafka\Consumer($conf);
$consumer->setLogLevel(LOG_DEBUG);
$consumer->addBrokers($KAFKA_SOCKET);

$topic = $consumer->newTopic(KAFKA_TOPIC);
$topic->consumeStart(0, RD_KAFKA_OFFSET_BEGINNING);

while (true) {
    $msg = $topic->consume(0, 1000);
    print_r($msg);
}

/*
%5|1623527935.432|CONFWARN|rdkafka#consumer-1| [thrd:app]: No `bootstrap.servers` configured: client will not be able to connect to Kafka cluster

//esto $msg->payload
Warning: Attempt to read property "payload" on null in /Users/ioedu/projects/prj_docker_imgs/kafka/php/kafka/consumer-2.php on line 17
PHP Warning:  Attempt to read property "payload" on null in /Users/ioedu/projects/prj_docker_imgs/kafka/php/kafka/consumer-2.php on line 17

Warning: Attempt to read property "payload" on null in /Users/ioedu/projects/prj_docker_imgs/kafka/php/kafka/consumer-2.php on line 17
*/