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
    // named parameters
     try{
         $return_arr = array();
         $stmt = $conn->prepare("SELECT * FROM MyGuestsPDO WHERE id =:iid");
         $stmt->bindParam(':iid', $id);
         $id = 2;
         $stmt->execute(); 
         $row = $stmt->fetch();
         array_push($return_arr,$row);
         //
         $json_str = json_encode($return_arr);
         $json_a = json_decode($json_str,true);
         $id = $json_a[0]['id'];
         $fname = $json_a[0]['firstname'];
         $lname = $json_a[0]['lastname'];
         $email = $json_a[0]['email'];
         echo $id . '      ' . $fname . '     '. $lname . '       '. $email;
     } catch(PDOException $e) {
         echo $stmt .'\r\n'. $e->getMessage();
     }
    // positional parameters
    // try{
    //     $return_arr = array();
    //     $stmt = $conn->prepare("SELECT * FROM MyGuestsPDO WHERE id =?");
    //     $idd = 2;
    //     $stmt->execute([$idd]); 
    //     $row = $stmt->fetch();
    //     array_push($return_arr,$row);
    //     //
    //     $json_str = json_encode($return_arr);
    //     $json_a = json_decode($json_str,true);
    //     $id = $json_a[0]['id'];
    //     $fname = $json_a[0]['firstname'];
    //     $lname = $json_a[0]['lastname'];
    //     $email = $json_a[0]['email'];
    //     echo $id . '      ' . $fname . '     '. $lname . '       '. $email;
    // } catch(PDOException $e) {
    //     echo $stmt .'\r\n'. $e->getMessage();
    // }    
    $conn = null;

?>
