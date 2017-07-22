<?php

$serverName = "localhost:8889";
$userName = "root";
$password = "root";
$dbName = "DiagnosticCenter";

try{
    $dbConnection = new PDO("mysql:host=$serverName;dbname:$dbName", $userName, $password);
    $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOException $exception){
    echo "Error: ".$exception->getMessage();
    exit;
}

?>