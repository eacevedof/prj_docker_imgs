<?php
//php -S 0.0.0.0:300 -t .
function console_loadenv(string $pathenv): void
{
    $envcontent = file_get_contents($pathenv);
    $envcontent = explode(PHP_EOL, $envcontent);
    foreach ($envcontent as $env)
    {
        if($env[0] === "#" || trim($env)==="") continue;
        $parts = explode("=",$env);
        $key = trim($parts[0]);
        array_shift($parts);
        $value = implode("=",$parts);
        $value = trim($value);

        putenv(sprintf("%s=%s", $key, $value));
        $_ENV[$key] = $value;
        $_SERVER[$key] = $value;
    }
}

function get_filename(?string $arg="c"): string
{
    if(is_null($arg)) return "";
    switch ($arg)
    {
        case "":
        case "c":
            return "consumer.php";

        case "p":
    }
    return "";
}
