<?php
$action = $_GET["action"] ?? "";
if(!$action) {
    $action = $argv[1];
}
if ($action==="p")
{
    include_once("kafka/producer.php");
}
elseif($action==="c")
{
    include_once("kafka/consumer.php");
}
else
{
    //include_once("kafka/consumer.php");
    //include_once("kafka/consumer-2.php");
    //include_once("kafka/consumer-3.php");
}

echo sprintf("%s:%s -> topic: %s",KAFKA_SERVER,KAFKA_PORT,KAFKA_TOPIC);
