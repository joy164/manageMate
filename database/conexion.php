<?php
// PHP Data Objects(PDO) Sample Code:
try {
    $conex = new PDO("sqlsrv:server = tcp:managemate-server.database.windows.net,1433; Database = MangeMate-DB_USERS", "administrador", "15101112jJ");
    $conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

// SQL Server Extension Sample Code:
$connectionInfo = array("UID" => "administrador", "pwd" => "15101112jJ", "Database" => "MangeMate-DB_USERS", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:managemate-server.database.windows.net,1433";
$conex = sqlsrv_connect($serverName, $connectionInfo);
?>
