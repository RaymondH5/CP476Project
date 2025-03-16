<?php
    $email = "Lun\shan.gao@example.com";
    $emailR = filter_var($email, FILTER_SANITIZE_EMAIL); // Remove all illegal characters from email
    if (!filter_var($emailR, FILTER_VALIDATE_EMAIL) === false) {
        echo("$emailR is a valid email address");
    } else {
        echo("$emailR is not a valid email address\n");
    }
    echo $emailR;
?>
