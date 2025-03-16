<?php
    //Demo 4 - passing reference

    function add_five($value): float {
        $value += 5.5;
        return $value;
    }
    $num = 2;
    $num = add_five($num);

    echo $num . "\n";
 ?>