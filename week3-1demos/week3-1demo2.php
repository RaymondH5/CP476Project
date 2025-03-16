<?php
    //Demo 2 - static variable

    function counter () { 
	    static $count = 0; 
	    return $count++;  // ++count;
    }
    echo "static  \$count  = ",counter(),"\n";
    echo "static  \$count  = ",counter(),"\n";
    echo "static  \$count  = ",counter(),"\n";
?>