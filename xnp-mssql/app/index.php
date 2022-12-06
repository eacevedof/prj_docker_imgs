<?php

function test_mssql()
{
    $host = "cont-mssql";
    $db   = "db_eduardoaf";
    $user = "sa";
    $pass = "Eaf-2022";
    $charset = "utf8";
    $port = "1433";

    $options = [
        \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
        \PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    try 
    {
        //$pdo = new \PDO($dsn, $user, $pass, $options);
        $pdo = new \PDO("sqlsrv:Server=$host,$port;Database=$db", $user , $pass);
        $sql = "
        SELECT name AS object_name
        ,SCHEMA_NAME(schema_id) AS schema_name
        ,type_desc
        ,create_date
        ,modify_date
        FROM sys.objects
        WHERE modify_date > GETDATE() - 1
        ORDER BY modify_date;
        ";
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
}//test_mssql()

test_mssql();
//mssql driver installed (pecl install pdo_sqlsrv sqlsrv):
//echo (PHP_VERSION_ID - PHP_RELEASE_VERSION);
//phpinfo();