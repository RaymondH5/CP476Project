<?php
declare(strict_types=1);

require 'auth.php';
requireLogin();

// Add Header
//include 'header.php';

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    $firstname = htmlspecialchars($_SESSION['first_name']);
    echo '<h1>Welcome ' . $firstname . ' to the Product Supplier Site</h1>';
}

// Add Footer
//include 'footer.php';

?>