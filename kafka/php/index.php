<?php
$action = $_GET["action"] ?? "";
if ($action==="p") {
    include_once("producer.php");
}
else {
    include_once("consumer.php");
}
