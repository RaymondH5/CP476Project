<?php
class Fruit{
    //properties
    public $name;
    public $color;
    //Methods
    function set_name($name){
        $this->name = $name;
    }
    function get_name() {
        return $this->name;
    }
}
ob_start();

$apple = new Fruit();
$peach="fruit";
$appleX = 0;

var_dump($apple instanceof Fruit);
$retV = ob_get_clean();

echo $retV;
?>