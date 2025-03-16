<?php
    $str = "<h1>Hello World <script>alert('hi')</script>!</h1>";
    $newstr = filter_var($str, FILTER_SANITIZE_ENCODED);
    //$newstring = filter_var($str, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    echo $newstr;
?>
