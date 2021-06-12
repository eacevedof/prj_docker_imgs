<?php
const KAFKA_SERVER = "127.0.0.1";
const KAFKA_PORT = "9092";
const KAFKA_TOPIC = "test";


$action = $_GET["action"] ?? "";
if ($action==="p") {
    include_once("kafka/producer.php");
}
else {
    include_once("kafka/consumer.php");
}
