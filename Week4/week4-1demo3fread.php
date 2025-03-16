<?php
    $myfile = fopen("webdictionary.txt", "r") or die("Unable to open file!");
    //$retString =fread($myfile, filesize("webdictionary.txt"));
    $retString =fread($myfile, 6);
    echo $retString;
    fclose($myfile);
?>
