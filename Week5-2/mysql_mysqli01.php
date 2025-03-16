<?php
header('Content-Type: text/plain; charset=UTF-8');
 #$var = 5 > TRUE;
 #echo $var;
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    try {
        $conn = new mysqli("localhost", "root", "Isucceed168", "mydb");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        echo "Connected to MySQL server \n";
        $conn->set_charset("utf8mb4");
    } catch(Exception $e) {
        error_log($e->getMessage());
        exit('Error connecting to database'); 
    }
    $sql = "SELECT * from MyGuests";
    $result = $conn->query($sql);
    foreach($result as $row) {
        //echo $row['column_name']; // Print a single column data
        echo print_r($row);       // Print the entire row data
    }
    //alternative method
    //while($row = mysqli_fetch_array($result)) {
    //    echo print_r($row);                 // Print the entire row data
    //}
    
    $conn->close();

?>