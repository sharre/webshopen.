<?php

$server = "localhost";
$dbName = "webshop";
$dbUser = "root";
$dbPass = "root";
$db_DSN = "mysql:host=$server;dbname=$dbName;charset=UTF8";

try {
    $conn = new PDO($db_DSN, $dbUser, $dbPass);

    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "<p>Connection failed: " . $e->getMessage() . "</p>";
    exit(1);
}