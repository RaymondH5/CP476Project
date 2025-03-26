<?php
if (isset($_COOKIE['user'])) {
    setcookie('user_id', '', time() - 3600, '/'); 
    setcookie('username', '', time() - 3600, '/');
    setcookie('email', '', time() - 3600, '/');
    setcookie('first_name', '', time() - 3600, '/');
    setcookie('last_name', '', time() - 3600, '/');
}

require 'DAL.php';

echo '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
    <main>
        <section class="hero">
                <div class="full-screen-container">
                    <div class="form-container">
                        <form id="login_form" method="post">
                            <h1 style="color: black;">Login</h1>
                            <br>
                            <div class="input-group">
                                <input type="text" id="username" name="username" placeholder="Username" required>
                            </div>
                            <div class="input-group">
                                <input type="password" id="password" name="password" placeholder="Password" required>
                            </div>
                            <div class="input-group">
                                <button id="button_login" class="center">Login</button>
                            </div>
                            <p> Don\'t have an account?</p>
                            <a class="signup-link" href="register.php">Register here</a>
                        </form>
                    </div>
                </div>
        </section>
    <main>
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

    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $usersInfo = loginUser($username);

    if ($usersInfo) {
        $storedPassHash = $usersInfo['password_hash'];

        if (password_verify($password, $storedPassHash)) {
            setcookie("user_id", $usersInfo['user_id'], time() + 3600, "/");
            setcookie("username", $usersInfo['username'], time() + 3600, "/");
            setcookie("email", $usersInfo['email'], time() + 3600, "/");
            setcookie("first_name", $usersInfo['first_name'], time() + 3600, "/");
            setcookie("last_name", $usersInfo['last_name'], time() + 3600, "/");

            header('Location: index.php');
            exit();
        }
        else {
            $error = 'Invalid username or password.';
        }
    } else {
        $error = 'Invalid username or password.';
    }
}
if (isset($error)) {
    echo "<script>alert('$error');</script>";
}

echo '</body></html>';
?>
