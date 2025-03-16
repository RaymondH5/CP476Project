<?php
    //Demo 7 - function as a parameter

    function apply ($f ,$x ,$y) {
        return $f($x ,$y );
    }
    function mult ($x ,$y) {
        return $x * $y;
    }
    echo apply ('mult' ,2,3),"\n";  
    echo mult(5, 8);
?>