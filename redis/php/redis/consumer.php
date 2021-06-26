<?php
echo "
=============
CONSUMER
=============
";
$redis = new Redis();
$redis->connect(getenv("REDIS_SERVER"), getenv("REDIS_PORT"));
//$array = $redis->lRange("some-key",0,-1);
$array = $redis->keys("*");
print_r($array);