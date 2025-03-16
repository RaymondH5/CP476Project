<?php
    //Demo 5 - setting cookies
    session_start();
    $cookie_name = "user";
    $cookie_value = "KellyHay";
    $var1=setcookie($cookie_name, $cookie_value, time() + 3600, "/"); 
    echo $var1, "\n";
    
?>