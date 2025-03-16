<?php
// Starting session
session_start();
 
// Accessing session data
echo 'Hi, ' . $_SESSION["name"] . ' ' . $_SESSION["hobby"];
echo "<br>";
print_r($_SESSION);
//destroy the session;
session_destroy();
?>