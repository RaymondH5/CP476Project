<?php
    $myfile = fopen("webdictionary.txt", "r") or die("Unable to open file!");
    //$var = fgets($myfile);
    $var = fgets($myfile, 6);
    echo $var;
    fclose($myfile);
?>
