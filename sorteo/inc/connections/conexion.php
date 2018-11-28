<?php

// $username = "lagordad_web";
// $password = "My(3+l=#kI.T";
// $database = "lagordad_web";
// $hostname = "localhost";
/* LOCAL */
$username = "root";
$password = "";
$database = "lagordad_web";
$hostname = "localhost";

try {
    $db = new PDO('mysql:dbname=' . $database . ';host=' . $hostname, $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}

setlocale(LC_CTYPE, "es_ES");
$query = $db->prepare("SET NAMES utf8");
$query->execute();
