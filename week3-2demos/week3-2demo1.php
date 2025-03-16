<?php

    //Demo 1 - global

    $x = 75;
    $y = 25;
    function addition() {
	    $x=10;
        $y = 0;
	    $GLOBALS['z'] = $GLOBALS['x'] + $GLOBALS['y'];
        //$z = $x + $y;
        //$GLOBALS["z"] = $x + $y;
        //global $z, $y;
        //global $x;
        //$z = $x + $y;
    }
    addition();
    echo $z;
?>