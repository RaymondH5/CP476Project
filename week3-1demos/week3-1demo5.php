<?php

    //Demo 5 - variable number of parameters

    function sum (... $numbers ) {
        if ( count ( $numbers ) < 1) return 0;
        $Val = 0;
        foreach ( $numbers as $value ):
            $Val += $value;
        endforeach;
        return $Val;
    }
    echo sum(0 ,1 ,2 ,3) , "\n";
    echo sum(0, TRUE ,"2" ,3e0, 4, 5), "\n";

?>