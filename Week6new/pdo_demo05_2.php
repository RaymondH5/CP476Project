<?php
    // Demo for debug_print_backtrace()
    include 'pdo_include.php';
    // Trigger a notice error
    echo $undefined_variable;

    // Trigger a warning error
    fopen('non_existing_file.txt', 'r');
?>