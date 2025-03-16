<?php
    //Demo 6-1 - anonymous function

    $test = function($name)
    {
	    printf("Hello %s\r\n", $name);
    };
    $test("World");
    $test("PHP");
?>