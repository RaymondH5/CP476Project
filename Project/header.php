<?php
declare(strict_types=1);

// Check if cookies are set for user_id, first_name, and last_name
if (!isset($_COOKIE['user_id']) || !isset($_COOKIE['first_name']) || !isset($_COOKIE['last_name'])) {
    header('Location: login.php');
    exit();
}

// Get user information from cookies
$id = $_COOKIE['user_id'];
$firstName = $_COOKIE['first_name'];
$lastName = $_COOKIE['last_name'];

// Set title and navigation options
$title = "Student Website";
$login_logout = '<li><a href="logout.php">Logout</a></li>';
$logged_in_options = '
    <li><a href="grades.php">Grades</a></li>
    <li><a href="classList.php">Class List</a></li>
    <li><a href="dropOut.php">Drop Out</a></li>
    <li><a href="reset_pass.php">Reset Password</a></li>
';

$user_details = '<li class="user-details"><a> ' . $firstName . ' ' . $lastName . '</a></li>';


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
                ' . $logged_in_options . $login_logout . $user_details . '
            </ul>
            <div class="hamburger" onclick="toggleMenu()">&#9776;</div>
        </nav>
    </header>
    <!-- End of Navigation Bar -->';

?>