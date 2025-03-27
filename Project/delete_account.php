<?php
declare(strict_types=1);
if (!isset($_COOKIE['user_id']) || !isset($_COOKIE['first_name']) || !isset($_COOKIE['last_name'])) {
    header('Location: login.php');
    exit();
}
require 'DAL.php';
$id = $_COOKIE['user_id'];
deleteAccount($id);
?>