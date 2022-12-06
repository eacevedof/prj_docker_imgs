<?php
function test_mssql()
{
    $host = "cont-mssql";
    $db   = "db_eduardoaf";
    $user = "sa";
    $pass = "sa";
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
        $sql = "
          SELECT name AS object_name
          ,SCHEMA_NAME(schema_id) AS schema_name
          ,type_desc
          ,create_date
          ,modify_date
          FROM sys.objects
          WHERE modify_date > GETDATE() - <n_days>
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
phpinfo();