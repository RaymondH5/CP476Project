<?php
    //Demo for get_defined_vars();
    $b = array(1, 1, 2, 3, 5, 8);

    $arr = get_defined_vars();

    // print $b
    print_r($arr["b"]);

    // print the command-line parameters if any
    print_r($arr["argv"]);

    // print all the server vars
    print_r($arr["_SERVER"]);

    // print all the available keys for the arrays of variables
    print_r(array_keys(get_defined_vars()));
    
?>