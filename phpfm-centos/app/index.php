<?php
function test_mysql()
{
    //$host = "127.0.0.1";
    $host = "cmari1"; //nombre del contenedor (docker ps -> NAMES)
    $db   = "mysql";
    $user = "root";
    $pass = "1234";
    $charset = "utf8";

    $options = [
        \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
        \PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    try 
    {
        $pdo = new \PDO($dsn, $user, $pass, $options);
        $sql = "SELECT * FROM help_topic WHERE 1 LIMIT 2";
        echo "<pre>";
        echo "<b>$sql</b>\n";
        $stmt = $pdo->query($sql);
        while ($row = $stmt->fetch()) 
        {
            print_r($row);
        }
        echo "</pre>";
    } 
    catch (\PDOException $e) 
    {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }
}//test_mysql()

echo "<pre><b>hello world in XNMP :) !!</b></pre><br/>";
test_mysql();
phpinfo();