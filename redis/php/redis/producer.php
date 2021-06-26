<?php
echo "
=============
PRODUCER
=============
";
$redis = new Redis();
$redis->connect(getenv("REDIS_SERVER"), getenv("REDIS_PORT"));
for($i=0; $i<100; $i++)
{
    $uuid = uniqid();
    $key = "id-$i";
    $ttl = $i + 50;
    $date = new \DateTime("+$ttl seconds");
    $enddate = $date->format("H:i:s");
    $value = "some rare value in string ".date("Y-m-d H:i:s")." - $enddate";
    $redis->set($key, $value);
    $redis->expire($key, $ttl);
}