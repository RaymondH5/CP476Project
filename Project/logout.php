<?php
// Check if the user is logged in
if (isset($_COOKIE['user_id'])) {
    // Remove the cookies
    setcookie('user_id', '', time() - 3600);
    setcookie("username", time() - 3600);
    setcookie("email", time() - 3600);
    setcookie('first_name', '', time() - 3600);
    setcookie('last_name', '', time() - 3600);
    header('Location: login.php');
    exit();
}

?>