<?php
    //filter IP address
    $ip = "108.10.20.1";
    if (!filter_var($ip, FILTER_VALIDATE_IP) === false) {
         echo("$ip is a valid IP address");
    } else {
         echo("$ip is not a valid IP address");
    }
?>
