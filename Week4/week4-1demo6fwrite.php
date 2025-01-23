<?php
    $myfile = fopen("webdictionary.txt", "a") or die("Unable to open file!");
    $txt = "I was a earnrgsegest student! And how about you? \n";
    $var = fwrite($myfile, $txt);
    echo $var;
    fclose($myfile);
?>