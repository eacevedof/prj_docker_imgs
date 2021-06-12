<?php
define("KAFKA_SERVER","localhost");
define("KAFKA_PORT","9092");
define("KAFKA_TOPIC","test");

$action = $_GET["action"] ?? "";
if ($action==="p") {
    include_once("kafka/producer.php");
}
else {
    include_once("kafka/consumer.php");
}
