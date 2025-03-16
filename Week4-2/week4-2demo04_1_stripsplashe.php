<?php
    header('Content-type: text/plain');
    $str = "\"your\" name is O'reilly?";
    echo $str, "\n";
    //$str = 'Is your name O'reilly?';
    echo stripslashes($str), "\n";
    // Outputs: Is your name O'reilly?
    
?>