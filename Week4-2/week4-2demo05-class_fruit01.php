<?php
class Fruit{
    //properties
    public $named;
    public $color;
    //Methods
    function set_name($name){
        $this->$named = $name;
    }
}
$apple = new Fruit();
$apple->set_name('Apple');
echo $apple->$named;
?>