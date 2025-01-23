<?php
    $servername = "localhost";
    $username = "root";
    $password = "Isucceed168";
    $dsn = "mysql:host=$servername;dbname=users;charset=utf8mb4";
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
        echo "Table MyGuests created successfully. \n";
    } catch(PDOException $e) {
          echo $sql .'\r\n'. $e->getMessage();
    }
    //insert data into table myguestsPDO
    Try{
        $sql = "INSERT INTO MyGuestsPDO (firstname, lastname, email)
         VALUES ('John', 'Doe', 'john@example.com')";
         // use exec() because no results are returned
         $conn->exec($sql);
         echo "New record created successfully \n";
    } catch(PDOException $e) {
         echo $sql . "\r\n" . $e->getMessage();
    }
    $conn = null;
   

?>