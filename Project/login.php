<?php
declare(strict_types=1);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
else{
    session_destroy();
}

require 'DAL.php';

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
        <form id="login_form" action="login.php" method="post">
            <h1>Login</h1>
            <div class="input-group">
                <input type="text" id="username" name="username" placeholder="Username" required>
            </div>
            <div class="input-group">
                <input type="password" id="password" name="password" placeholder="Password" required>
            </div>
            <div class="input-group">
                <button id="button_login" class="center">Login</button>
            </div>

            <p> Don\'t have a account?</p>
            <a class="signup-link" href="register.php">Register here</a>
        </form>
    </div>
</body
';


if (isset($error)) {
    echo '<div class="error">' . $error . '</div>';
}

include 'footer.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //sanitize parameters 
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    //user's info
    $usersInfo = getUsersInfo($username);

    if ($usersInfo) {
        $userid = $usersInfo['user_id'];
        $storedPassHash = $usersInfo['password_hash'];
        $firstName = $usersInfo['first_name'];
        $lastName = $usersInfo['last_name'];

        if (password_verify($password, $storedPassHash)) {

            $_SESSION['user_id'] = $userid;
            $_SESSION['first_name'] = $firstName;
            $_SESSION['last_name'] = $lastName;

            header('Location: index.php');
            exit();
        } else {
            $error = 'Invalid username or password.';
        }
    } else {
        $error = 'Invalid username or password.';
    }
}

?>
