<?php
echo "
=============
PRODUCER
=============
";
$redis = new Redis();
$redis->connect(getenv("REDIS_SERVER"), getenv("REDIS_PORT"));
for($i=0; $i<10; $i++)
{
    $uuid = uniqid();
    $key = "id-$i-$uuid";
    $value = "some rare value in string ".date("Y-m-d H:i:s");
    $redis->set($key, $value);
    $redis->expire($key, $i+30);
}