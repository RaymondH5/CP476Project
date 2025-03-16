<?php
    $servername = "localhost";
    $username = "root";
    $password = "Isucceed168";
    $dsn = "mysql:host=$servername;dbname=mydb;charset=utf8mb4";
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
        exit('Connection failed'); //something a user can understand
    }
    try{
        // create database
        $sql = "CREATE DATABASE myDBPDO";
        // use exec() because no results are returned
        $conn->exec($sql);
        echo "Database created successfully \n";
    } catch (PDOException $e) {
        error_log($e->getMessage());
        exit('Database creation failed'); //something a user can understand
    }
    $conn=null;

?>