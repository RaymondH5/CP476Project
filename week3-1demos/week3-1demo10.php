<?php
    // Including file
    //require "myincludeFile.php";
    include "myincludeFile.php";
    // Calling the function
    multiplySelf(2); // Output: 4
    echo "\n";

    // Including file
    //require "myincludeFile.php";
    include_once "myincludeFile.php";
    // Calling the function
    multiplySelf(5); 
    echo "\n";
?>