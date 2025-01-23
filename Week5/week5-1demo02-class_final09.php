<?php
    final class Fruit{
        final function intro(){       
     //class Fruit{
     //    function intro(){
        echo "This is final";
        
        }
    }
    class Strawberry extends Fruit{
        public function intro()
        {
            echo "I am the final!";
        }
    }
    $var = new Strawberry();
    $var->intro();
?>