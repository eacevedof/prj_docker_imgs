<?php
date_default_timezone_set("Europe/Madrid");
$redis = new Redis();
$array = $redis->lRange("some-key",0,-1);
print_r($array);
