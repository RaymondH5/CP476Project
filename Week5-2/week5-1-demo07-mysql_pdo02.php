<?php
    $servername = "localhost";
    $username = "root";
    $password = "Isucceed168";
    $dsn = "mysql:host=$servername;dbname=users;charset=utf8mb4";
    $options = [
        PDO::ATTR_EMULATE_PREPARES   => false, // turn off emulation mode 
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //make the default fetch be an associative array
    ];
    try {
        $conn = new PDO($dsn, $username, $password, $options);
        echo "Connected successfully \n";
    } catch (PDOException $e) {
        error_log($e->getMessage());
        exit('Something weird happened'); //something a user can understand
    }
    $conn=null;


?>