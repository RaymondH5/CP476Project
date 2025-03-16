<?php

    class parentC {
        function func1($name) {
            echo "Hello " . $name . "\n";
        }
    }

    class childC extends parentC {
        function func1($name) {
            echo "Hi " . $name . "\n";
        }
    }
$obj1 = new childC();
$obj1->func1("John");
$obj2 = new parentC();
$obj2->func1("Mary");
?>