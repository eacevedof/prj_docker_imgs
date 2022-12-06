<?php
//vscode con xdebug
$myarray = [
  "a" => "some string",
  "b" => ["other", "array"]
];

$mydomain = "eduardoaf.com";

$obj = new stdClass();
$obj->data = $myarray;
$obj->domain = $mydomain;

echo xdebug_info();