<?php
    //Demo for get_defined_vars();
    $b = array(1, 1, 2, 3, 5, 8);

    $arr = get_defined_vars();

    // print $b
    print_r($arr["b"]);

    // print the command-line parameters if any
    if (isset($arr['argv'])) {
        print_r($arr['argv']);
    } else {
        echo "No command-line arguments available.\n";
    }

    // print all the server vars
    if (isset($arr['_SERVER'])) {
        print_r($arr['_SERVER']);
    } else {
        echo "No server variables available.\n";
    }

    // print all the available keys for the arrays of variables
    print_r(array_keys(get_defined_vars()));
    
?>