<?php

declare(strict_types=1);

//Backend for the Database Access Layer (DAL)

$envPath = dirname(__DIR__) . '/.env';  // Locate the .env file one level up from the current directory
if (!file_exists($envPath)) {
    die("Error: .env file not found at $envPath");
}

$env = parse_ini_file($envPath);

if (!$env) {
    die("Error: Unable to parse .env file");
}

$servername = $env['DB_HOST'] ?? null;
$username = $env['DB_USER'] ?? null;
$password = $env['DB_PASS'] ?? null;
$dbname = $env['DB_NAME'] ?? null;

if (!$servername || !$username || !$password || !$dbname) {
    die("Environment variables not set properly in .env file");
}

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->select_db($dbname);

function getUsersInfo($id) {
    /*
    *  Get the user's first and last name
    *  @param string $id - the user's id
    *  @return array - the user's ID, hashed password, first name, and last name
    */
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Ensure that the user exists
    if ($result->num_rows === 0) {
        die("Invalid user id");
    }

    $row = $result->fetch_assoc();
    $user_id = $row['user_id'];
    $password_hash = $row['password_hash'];
    $firstName = $row['first_name'];
    $lastName = $row['last_name'];
    $stmt->close();

    return [
        'user_id' => $user_id,
        'password_hash' => $password_hash,
        'first_name' => $firstName,
        'last_name' => $lastName
    ];
}

function registerUser($username, $email, $password_hash, $first_name, $last_name) {
    global $conn;

    if (!$username || !$email || !$password_hash || !$first_name || !$last_name) {
        die("Error: All parameters must be provided");
    }

    $stmt = $conn->prepare("INSERT INTO users (username, email, password_hash, first_name, last_name) VALUES (?, ?, ?, ?, ?)");
    if (!$stmt) {
        die("Error: " . $conn->error);
    }

    $stmt->bind_param("sssss", $username, $email, $password_hash, $first_name, $last_name);
    $success = false;
    if ($stmt->execute()) {
        echo "New record created successfully";
        $success = true;
    } else {
        echo "Error: " . $stmt->error;
        $success = false;
    }
    
    $stmt->close();

    return $success;
}

function closeConnection() {
    global $conn;
    $conn->close();
}