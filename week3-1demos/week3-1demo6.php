<?php
    //Demo 6 - anonymous functions

    $funcs = [ function ($x,$y) { return 2*( $x+$y ); }, 
               function ($x,$y) { return 3+( $x+$y ); }];
    foreach ( $funcs as $func ) {
        echo $func (5,3) ,"\n";
    }

    $funcs = array(function ($x,$y) { return 2*( $x+$y ); }, 
                   function ($x,$y) { return 3+( $x+$y ); });
    foreach ( $funcs as $func ) {
        echo $func (5,3) ,"\n";
    }
?>