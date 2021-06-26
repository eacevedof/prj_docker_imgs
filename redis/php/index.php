<?php
include("redis/config.php");
$pathenv = realpath(__DIR__."/../.env");
console_loadenv($pathenv);
date_default_timezone_set(getenv("TIME_ZONE"));

$action = $_GET["action"] ?? "";
if(!$action) {
    $action = $argv[1];
}
$filename = get_filename($action);
$path = "redis/$filename";
include_once($path);

