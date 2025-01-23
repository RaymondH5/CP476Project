<?php
// Enable detailed error reporting for MySQLi
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    // Attempt to establish a database connection
    $conn = new mysqli("localhost", "root", "Razormay30", "mydb");
    
    // Check if the connection was successful
    if ($conn->connect_error) {
        // If connection failed, print detailed error message and terminate script
        echo "Connection failed: " . $conn->connect_error . "\n";
        exit();
    }
    
    // If connection was successful, set charset to utf8mb4
    $conn->set_charset("utf8mb4");
    
    // Connection was successful, print success message
    echo "Connected to database successfully\n";

    // Create database after successful connection
    $sql = "INSERT INTO MyGuests (firstname, lastname, email) VALUES ('John', 'Doe', 'john@example.com')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } 
    else 
    {
        echo "Error: " . $conn->error;
    }

} catch(Exception $e) {
    // If any exception occurs during connection attempt, log error and exit script
    error_log($e->getMessage());
    exit('Error connecting to database');
}

// Close the database connection
$conn->close();
?>