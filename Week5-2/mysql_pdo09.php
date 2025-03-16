<?php
   $servername = "localhost";
   $username = "root";
   $password = "Isucceed168";
   $dsn = "mysql:host=$servername;dbname=myDBPDO;charset=utf8mb4";
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
    $stmt = $conn->prepare("INSERT INTO MyGuestsPDO (firstname, lastname, email) VALUES (:fname, :lname, :eml)");
    $stmt->bindParam(':fname', $firstname);
    $stmt->bindParam(':lname', $lastname);
    $stmt->bindParam(':eml', $email);
    //$stmt->bindParam(':v_date', $reg_date);

// insert one row
$firstname = 'Dan';
$lastname = 'Yang';
$email = 'dan.yang@gmail.com';
$reg_date = '2020-02-20';
$stmt->execute();

// insert another row with different values
$firstname = 'John';
$lastname = 'Du';
$email = 'john.du@gmail.com';
$reg_date = '2018-10-06';
$stmt->execute();
?>