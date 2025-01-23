<?php

declare(strict_types=1);

require 'DAL.php';

// Add Header
include 'header.php';
//echo getHeader();
    
echo '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="stylesheets/styles.css">
</head>
<body>
    <div class="form-container">
        <form id="register_form" action="register.php" method="post">
            <h1>Register</h1>
            <div class="input-group">
                <input type="text" id="username" name="username" placeholder="Username" required>
            </div>
            <div class="input-group">
                <input type="email" id="email" name="email" placeholder="Email" required>
            </div>
            <div class="input-group">
                <input type="password" id="password" name="password" placeholder="Password" required>
            </div>
            <div class="input-group">
                <input type="text" id="first_name" name="first_name" placeholder="First Name" required>
            </div>
            <div class="input-group">
                <input type="text" id="last_name" name="last_name" placeholder="Last Name" required>
            </div>
            <div class="input-group">
                <button id="button_register" class="center">Register</button>
            </div>
        </form>
    </div>
</body>
</html>
';

// Add Footer
include 'footer.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $username = $_POST['username'] ?? null;
    $email = $_POST['email'] ?? null;
    $password = $_POST['password'] ?? null;
    $first_name = $_POST['first_name'] ?? null;
    $last_name = $_POST['last_name'] ?? null;

    //validate data
    if (htmlspecialchars($username) && htmlspecialchars($email) && htmlspecialchars($password) && htmlspecialchars($first_name) && htmlspecialchars($last_name)) {
        
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        
        if (registerUser($username, $email, $password_hash, $first_name, $last_name)) {
            header('Location: login.php');
            exit();
        } else {
            echo "Registration failed. Please try again.";
        }
    } else {
        echo "All fields are required.";
    }
}

?>