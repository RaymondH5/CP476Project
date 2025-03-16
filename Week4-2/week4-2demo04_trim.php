<?php
    header('Content-type: text/plain');
    $str = "           Hello World  !   ";
    echo "Without trim: " . $str;
    echo "\n";
    echo "With trim: " . trim($str);
?>