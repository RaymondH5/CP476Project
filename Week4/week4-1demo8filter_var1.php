<?php
    $var1=filter_var('bob%example.com', FILTER_VALIDATE_EMAIL);
    echo $var1;
    $var2=filter_var('http:&/example.com', FILTER_VALIDATE_URL);
    echo $var2;
?>