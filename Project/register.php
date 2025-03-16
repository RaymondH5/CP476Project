<?php
declare(strict_types=1);

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
    <header>
        <nav class="navbar">
            <div class="logo"><a href="index.php">' . "Student Website" . '</a></div>
            <ul class="nav-links">
            </ul>
            <div class="hamburger" onclick="toggleMenu()">&#9776;</div>
        </nav>
    </header>
    <div class="full-screen-container hero">
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
                <a class="signup-link" href="login.php">Back to login</a>
            </form>
        </div>
    </div>
    <div class="wrapper">
        <div class="content">
            <!-- Main page content goes here -->
        </div>
        <footer>
            <p class="copyright">&copy; 2025 Student Website.</p>
        </footer>
    </div>
</body>
</html>
';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $userInput = [$_POST['username'] ?? null, $_POST['email'] ?? null, $_POST['password'] ?? null, $_POST['first_name'] ?? null, $_POST['last_name'] ?? null];
    
    $validatedInputs = validateInputs(...$userInput);
    
    if ($validatedInputs !== false) {

        $validatedInputs[2] = password_hash($validatedInputs[2], PASSWORD_DEFAULT);
        
        if (registerUser(...$validatedInputs)) {
            header('Location: login.php');
            exit();
        }
    } 
}
if (isset($error)) {
    echo "<script>alert('$error');</script>";
}
echo '</body></html>';

?>