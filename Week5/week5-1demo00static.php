<?php
class Employee {
    static $totalNumber = 0;
    public $name ;
    function __construct ( $name ) {
        $this -> name = $name ;
        Employee :: $totalNumber ++;
} }
$e1 = new Employee ( " Ada " );
$e2 = new Employee ( " Ben " );
echo Employee :: $totalNumber;


?>