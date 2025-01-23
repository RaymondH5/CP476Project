<?php
    $str = 'your name is O\'reilly?';
    //$str = 'Is your name O'reilly?';
    echo stripslashes($str), "\n";
    // Outputs: Is your name O'reilly?
    echo $str;
?>