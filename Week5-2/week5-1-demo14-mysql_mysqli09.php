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
    // create a table
    $sql = "CREATE TABLE MyGuests (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        firstname VARCHAR(30) NOT NULL, 
        lastname VARCHAR(30) NOT NULL, 
        email VARCHAR(50), 
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP )";
    if ($conn->query($sql) === TRUE) {
          echo "Table MyGuests created successfully. \n";
    } else {
          echo "Error creating table: " . $conn->error;
    }
    $sql = $conn->prepare("INSERT INTO myguests(firstname, lastname, email) VALUES (?, ?, ?)");
    $sql->bind_param("sss", $fn, $ln, $email); 
    $fn = "Mary";
    $ln = "Gao";
    $email = "mary_gao@gmail.com"; 
    if($sql->execute() == true)
    {
        echo "Insertion succeeded \n";
    }else{
        echo "Insertion failed \n";
    }

    $conn->close();

?>