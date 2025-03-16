<?php
    //global variables
    header('Content-type: text/plain');

    //you can set the global variables
    echo $_SERVER["USER"] ="ray";
    echo "\n";
    echo $_SERVER['SERVER_ADDR'];
    echo "\n";
    echo $_SERVER['SERVER_NAME'];
    echo "\n";
    echo $_SERVER['REQUEST_METHOD'];
    echo "\n";
    echo $_SERVER['REMOTE_ADDR'];
    echo "\n";
    echo $_SERVER['SERVER_PORT'];
    echo "\n";
    echo $_SERVER["USER"];

    $var1 =$_SERVER['PHP_SELF'];;
    print $var1;
    echo "\n";
    echo $_SERVER['SCRIPT_NAME'];
    echo "\n";
?>