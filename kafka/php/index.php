<?php

$action = $_GET["action"] ?? "";
if(!$action) {
    $action = $argv[1];
}
$filename = get_filename($action);
$path = "kafka/$filename";
include_once($path);

echo sprintf("%s:%s -> topic: %s",KAFKA_SERVER,KAFKA_PORT,KAFKA_TOPIC);

function get_filename(?string $arg="c"): string
{
    if(is_null($arg)) return "";
    switch ($arg)
    {
        case "":
        case "c":
            return "consumer.php";
        case "c1":
            return "consumer-1.php";
        case "c2":
            return "consumer-2.php";
        case "c3":
            return "consumer-3.php";
        case "p":
        case "p1":
            return "producer-1.php";
        case "p2":
            return "producer-2.php";
        case "p3":
            return "producer-3.php";

    }
    return "";
}