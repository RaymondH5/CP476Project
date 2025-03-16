<?php
    // Demo 2-1 - static methods

    //class greeting {
    //    public static function welcome() {
    //        echo "Hello World! \n";
    //    }  
    //}
    //greeting::welcome();
    //$grt = new greeting; 
    //$grt->welcome();
    function counter(){
        static $cnt=0;
        $cnt++;
        return $cnt; 
    }
    $var1 = counter();
    echo "$var1 \n";
    $var2 = counter();
    echo "$var2 \n";
    $var3 = counter();
    echo "$var3 \n";   
?>