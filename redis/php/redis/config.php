<?php
//php -S 0.0.0.0:300 -t .
const REDIS_SERVER = "127.0.0.1";
const REDIS_PORT = "9092";
const REDIS_TOPIC = "test";
$REDIS_SOCKET = sprintf("%s:%s",REDIS_SERVER,REDIS_PORT);
