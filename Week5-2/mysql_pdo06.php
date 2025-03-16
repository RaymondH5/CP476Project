<?php
    $servername = "localhost";
    $username = "root";
    $password = "Isucceed168";
    $dsn = "mysql:host=$servername;dbname=myDBPDO;charset=utf8mb4";
    try {
        $conn = new PDO($dsn, $username, $password);
        echo "Connected successfully \n";
    } catch (PDOException $e) {
        error_log($e->getMessage());
        exit('Something weird happened'); //something a user can understand
    }
    Try{
        $sql = "CREATE TABLE MyGuestsPDO (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            firstname VARCHAR(30) NOT NULL,  
            lastname VARCHAR(30) NOT NULL, 
            email VARCHAR(50),
            reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP )";
        // use exec() because no results are returned
        $conn->exec($sql);
        echo "Table MyGuestsPDO created successfully";
    } catch(PDOException $e) {
          echo $sql .'\r\n'. $e->getMessage();
    }
    

?>