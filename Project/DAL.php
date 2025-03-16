<?php

declare(strict_types=1);

function OpenConnection() {

    $envPath = dirname(__DIR__) . '/.env';
    if (!file_exists($envPath)) {
        die("<script>alert(Error: .env file not found at $envPath);</script>");
    }

    $env = parse_ini_file($envPath);

    if (!$env) {
        die("<script>alert(Error: Unable to parse .env file);</script>");
    }

    $servername = $env['DB_HOST'] ?? null;
    $username = $env['DB_USER'] ?? null;
    $password = $env['DB_PASS'] ?? null;
    $dbname = $env['DB_NAME'] ?? null;

    if (!$servername || !$username || !$password || !$dbname) {
        die("<script>alert(Environment variables not set properly in .env file);</script>");
    }

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("<script>alert(Connection failed: " . $conn->connect_error . ");</script>");
    }

    return $conn;
}


function loginUser($username) {

    $conn = OpenConnection();

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");

    $stmt->bind_param("s", $username);
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

    $conn = OpenConnection();

    $stmt = $conn->prepare("INSERT INTO users (username, email, password_hash, first_name, last_name) VALUES (?, ?, ?, ?, ?)");

    if (!$stmt) {
        error_log("Error executing statement: " . $conn->error . " SQL: " . $conn->query);
        echo "<script>alert(Error: " . $conn->error. ");</script>";
        return false;  // Early exit if preparing fails
    }

    $stmt->bind_param("sssss", $username, $email, $password_hash, $first_name, $last_name);
    $success = false;
    if ($stmt->execute()) {
        $success = true;
    } else {
        echo "<script>alert(Error: " . $stmt->error . ");</script>";
        $success = false;
    }
    
    $stmt->close();

    return $success;
}

function validateInputs(...$inputs) {
    $sanitizedInputs = [];
    
    foreach ($inputs as $input) {
        if (!isset($input) || trim($input) === '') { 
            echo "<script>alert('All fields are required. Please fill in the missing fields.');</script>";
            return false;
        }
        $sanitized = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
        $sanitizedInputs[] = $sanitized;
    }
    
    return $sanitizedInputs;
}

