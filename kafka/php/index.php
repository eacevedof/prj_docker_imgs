<?php
$action = $_GET["action"] ?? "";
if(!$action) {
    $action = $argv[1];
}
$filename = get_filename($action);
$path = "kafka/$filename";
include_once($path);

echo sprintf("%s:%s -> topic: %s",KAFKA_SERVER,KAFKA_PORT,KAFKA_TOPIC);
