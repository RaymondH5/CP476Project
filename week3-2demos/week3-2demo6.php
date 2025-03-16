<?php
   //Demo 6 - deleting cookies

    $cookie_name = "user";
    $cookie_value = "John Doe";
    ob_start();
    $var1=setcookie($cookie_name, $cookie_value, time() + 3600, "/"); 
    echo "$var1 \n";
    
    //delete the cookie
    $var2=setcookie($cookie_name, $cookie_value, time() - 3600, "/");
    echo $var2;
    ob_flush();
    //question? you will get the same result if you remove ob_start() and ob-flush()?
    //if output buffer isnt auto then no the result will be different as cookies must be set before any output is sent to the browser
?>