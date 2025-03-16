<?php
    class Person{
        
        public function status() {
            $this->getStatus();
        }
        protected function getStatus(){
            echo "Person is alive";
        }
    }
    class Deceased extends Person{
        protected function getStatus(){
            echo "Person is deceased";
        }
    }
    $died = new Deceased();
    $died->status();

?>