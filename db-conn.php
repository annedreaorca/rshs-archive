<?php

$sName = "localhost";
$uName = "u873696219_RSHS_Archive";
$pass = "Quasimodo@84526";
$db_name = "u873696219_rshs_archive";

try {
    $conn = new PDO("mysql:host=$sName;dbname=$db_name",
                    $uName, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed : ". $e->getMessage();
}