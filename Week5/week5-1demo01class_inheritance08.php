<?php
    class Foo{
        
        public function printItem($string) {
            echo 'Foo:'.$string. PHP_EOL;
        }
        public function printPHP(){
            echo "PHP is great.". PHP_EOL;
        }
    }
    class Bar extends Foo{
        public function printItem($string){
            echo "Bar:". $string. PHP_EOL;
        }
    }
    $bar = new Bar();
    $bar->printItem('baz');
    $bar->printPHP();

?>