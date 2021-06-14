<?php
include_once("config.php");
echo "=============\n";
echo " consumer-3.php ($KAFKA_SOCKET)\n";
echo "=============\n";

//https://www.programmersought.com/article/1490128927/
$conf = new RdKafka\Conf();
$conf->setDrMsgCb(function ($kafka, $message) {
    file_put_contents("./c_dr_cb.log", var_export($message, true), FILE_APPEND);
});
$conf->setErrorCb(function ($kafka, $err, $reason) {
    file_put_contents("./err_cb.log", sprintf("Kafka error: %s (reason: %s)", rd_kafka_err2str($err), $reason) . PHP_EOL, FILE_APPEND);
});

//$conf->set("bootstrap.servers", $KAFKA_SOCKET);
//$conf->set("debug","all");

//Set the consumer group
$conf->set("group.id", "test-consumer-group");

$rk = new RdKafka\Consumer($conf);
$rk->addBrokers(KAFKA_SERVER);

$topicConf = new RdKafka\TopicConf();
$topicConf->set("request.required.acks", 1);
 // Automatically submit confirmation within the interval of interval . ms, it is recommended not to start
//$topicConf->set("auto.commit.enable", 1);
$topicConf->set("auto.commit.enable", 0);
$topicConf->set("auto.commit.interval.ms", 100);

 // Set the offset storage to file
//$topicConf->set("offset.store.method", "file");
// Set the offset store as a broker
 $topicConf->set("offset.store.method", "broker");
//$topicConf->set("offset.store.path", __DIR__);

 //smallest: simply understood as starting from scratch, in fact equivalent to the above earliest
 //largest: Simple to understand that starting from the latest, it is equivalent to the latest above.
//$topicConf->set("auto.offset.reset", "smallest");

$topic = $rk->newTopic(KAFKA_TOPIC, $topicConf);

 // parameter 1 consumption partition 0
 // RD_KAFKA_OFFSET_BEGINNING start over consumption
 // RD_KAFKA_OFFSET_STORED The last consumed offset record begins to consume
 // RD_KAFKA_OFFSET_END Last consumption
$topic->consumeStart(0, RD_KAFKA_OFFSET_BEGINNING);
//$topic->consumeStart(0, RD_KAFKA_OFFSET_END); //
//$topic->consumeStart(0, RD_KAFKA_OFFSET_STORED);

while (true) {
    //    parameter 1 indicates the consumption partition, here is the partition 0
    // parameter 2 indicates how long the synchronization is blocked
    $message = $topic->consume(0, 12 * 1000);
    print_r($message);
    if (is_null($message)) {
        sleep(1);
        echo "No more messages\n";
        continue;
    }
    switch ($message->err) {
        case RD_KAFKA_RESP_ERR_NO_ERROR:
            echo "RD_KAFKA_RESP_ERR_NO_ERROR\n";
            var_dump($message);
            break;
        case RD_KAFKA_RESP_ERR__PARTITION_EOF:
            echo "No more messages; will wait for more\n";
            break;
        case RD_KAFKA_RESP_ERR__TIMED_OUT:
            echo "Timed out\n";
            break;
        default:
            throw new \Exception($message->errstr(), $message->err);
            break;
    }
}