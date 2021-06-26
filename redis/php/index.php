<?php
include("redis/config.php");
date_default_timezone_set(getenv("TIME_ZONE"));
$redis = new Redis();
$redis->connect(getenv("REDIS_SERVER"),getenv("REDIS_PORT"));
$array = $redis->lRange("some-key",0,-1);
print_r($array);
