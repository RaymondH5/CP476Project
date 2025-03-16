<?php
    class Person{
        const GREETING= "Hello CP476\n";
        public function status() {
            $this->getStatus();
        }
        public function getStatus(){
            echo self::GREETING;
        }
    }
    
    $died = new Person();
    $died->getStatus();

?>