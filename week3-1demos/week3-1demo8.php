<?php
    //declare(strict_types=1);
    //Demo 8 - strict type checking

    function mult5(int $x ): int 
    { 
	    return 5* $x;
    }
    echo mult5 (1) , "\n";
    echo mult5 ("1"), "\n";
    echo mult5 (1, 2, 3) , "\n"

?>