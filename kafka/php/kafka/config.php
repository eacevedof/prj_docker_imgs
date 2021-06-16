<?php
//php -S 0.0.0.0:300 -t .
const KAFKA_SERVER = "127.0.0.1";
const KAFKA_PORT = "9092";
const KAFKA_TOPIC = "test";
$KAFKA_SOCKET = sprintf("%s:%s",KAFKA_SERVER,KAFKA_PORT);

function get_filename(?string $arg="c"): string
{
    if(is_null($arg)) return "";
    switch ($arg)
    {
        case "":
        case "c":
        case "c1":
            return "consumer.php";
        case "c2":
            return "consumer-2.php";
        case "c3":
            return "consumer-3.php";
        case "p":
        case "p1":
            return "producer.php";
        case "p2":
            return "producer-2.php";
        case "p3":
            return "producer-3.php";

    }
    return "";
}