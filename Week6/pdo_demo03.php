<?php
    // demo for bindValue using positional parameters
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
    $EID = '50001';
    $salary = 120000;
    $sth = $conn->prepare('SELECT name, birth, PhoneNumber
        FROM credential
        WHERE EID < ? AND salary < ?');
    $sth->bindValue(1, $EID, PDO::PARAM_STR);
    $sth->bindValue(2, $salary, PDO::PARAM_INT);
    $sth->execute();
    
    // fetch the results
    $result = $sth->fetchAll();
    print_r($result);   
    //release the object
    $conn=null;


?>