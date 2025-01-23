<?php
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    try {
        $conn = new mysqli("localhost", "root", "Isucceed168", "users");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        echo "Connected to MySQL server \n";
        $conn->set_charset("utf8mb4");
    } catch(Exception $e) {
        error_log($e->getMessage());
        exit('Error connecting to database'); 
    }
    //create a database
    $sql = "CREATE DATABASE myDB";
    if ($conn->query($sql) === TRUE) {
          echo "Database created successfully";
    } else {
          echo "Error creating database: " . $conn->error;
    }
    $conn->close();
    

?>