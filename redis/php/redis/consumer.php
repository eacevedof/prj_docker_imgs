<?php
$redis = new Redis();
$redis->connect(getenv("REDIS_SERVER"), getenv("REDIS_PORT"));
$array = $redis->lRange("some-key",0,-1);
print_r($array);