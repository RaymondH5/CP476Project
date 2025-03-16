<?php
   //demo for using prepare API without bind APIs 
   $servername = "localhost"; $username = "root";
   $password = "Isucceed168";
   $dsn = "mysql:host=$servername; dbname=users;charset=utf8mb4";
  
   try {
       $conn = new PDO($dsn, $username, $password);
       echo "Connected successfully \n";
   } catch (PDOException $e) {
       error_log($e->getMessage());
       exit('Something weird happened'); //something a user can understand
   }
   $stmt = $conn->prepare("SELECT * FROM credential WHERE name = :Name");
   $name = 'alice';
   $stmt->bindValue(':Name', $name, PDO::PARAM_STR);
   //execute
   $stmt->execute();
   // fetch the results
   $result = $stmt->fetchAll();
   print_r($result);   
   //release the object
   $conn=null;

?>