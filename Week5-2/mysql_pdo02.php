<?php
$servername = "localhost";
$username = "root";
$password = "Isucceed168";
$database = "mydb";

$dsn = "mysql:host=$servername;dbname=$database;charset=utf8mb4";
$options = [
    PDO::ATTR_EMULATE_PREPARES   => false,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $conn = new PDO($dsn, $username, $password, $options);
    echo "Connected successfully!<br>";
} catch (PDOException $e) {
    // Display the exact error message
    exit("Connection failed: " . $e->getMessage());
}

$conn = null;
?>
