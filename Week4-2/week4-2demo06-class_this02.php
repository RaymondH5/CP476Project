<?php
class Person{
    public $Vname;
    function __construct($name){
        $this->Vname = $name;
        //$Vname = $name;
    }

}
$jack = new Person("Jack");
echo $jack->Vname;

?>