<?php
//php -S 0.0.0.0:300 -t .
const KAFKA_SERVER = "127.0.0.1";
const KAFKA_PORT = "9092";
const KAFKA_TOPIC = "test";
$KAFKA_SOCKET = sprintf("%s:%s",KAFKA_SERVER,KAFKA_PORT);
