<?php
    //Demo 1-1 - global key word
    $x = 75;
    $y = 25;
    function addition() {
        $x=10;
	    globAl $y;
        global $x;
        //$x=10;
        globaL $z;
        //
        $z = $x + $y;
        // $GLOBALS['o1'] = $GLOBALS['x'] + $GLOBALS['y'];
    }
    addition();
    echo $z;
    //echo "\n";
    //echo $o1;

?>