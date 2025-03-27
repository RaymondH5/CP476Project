<?php
declare(strict_types=1);

if (!isset($_COOKIE['user_id']) || !isset($_COOKIE['first_name']) || !isset($_COOKIE['last_name'])) {
    header('Location: login.php');
    exit();
}

$id = $_COOKIE['user_id'];
$firstName = $_COOKIE['first_name'];
$lastName = $_COOKIE['last_name'];
$title = "Student Website";
$login_logout = '<li><a href="logout.php">Logout</a></li>';
$reset_pass = '<li><a href="reset_pass.php">Reset Password</a></li>';
$delete_account = '<li><a href="delete_account.php">Delete Account</a></li>';
$user_details = '<li class="user-details"><strong>' . $firstName . ' ' . $lastName .  '</strong></li>';


echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professional Website</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="stylesheets/styles.css">
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <header>
        <nav class="navbar">
            <div class="logo"><a href="index.php">' . $title . '</a></div>
            <ul class="nav-links">
                ' . $user_details . $login_logout . $reset_pass . $delete_account . '
            </ul>
            <div class="hamburger" onclick="toggleMenu()">&#9776;</div>
        </nav>
    </header>
    <!-- End of Navigation Bar -->';

?>