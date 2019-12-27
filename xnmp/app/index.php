<?php
echo "hello world in XNMP :)) !!";
echo "<hr/>";

function test_mysql()
{
    $host = "127.0.0.1";
    $db   = "mysql";
    $user = "root";
    $pass = "1234";
    $charset = "utf8mb4";
    //var_export(\PDO::ATTR_FETCH_ASSOC);die;
    $options = [
        \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
        \PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    try {
         $pdo = new \PDO($dsn, $user, $pass, $options);
         $sql = "SELECT * FROM help_topic WHERE 1";
         
         $stmt = $pdo->query($sql);
         while ($row = $stmt->fetch()) {
             echo $row['name']."<br />\n";
         }
    } catch (\PDOException $e) {
         throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }    
}//test_mysql()

test_mysql();
phpinfo();