<?php
   interface Animal{
        public function makeSound();
   }
   class Cat implements Animal{
       public function makeSound()
       {
           echo "Meow \n";
       }
   }
   class Dog implements Animal{
       public function makeSound()
       {
           echo "Bark \n";
       }
   }
   $cat = new Cat();
   $dog = new Dog();
   $cat->makeSound();
   $dog->makeSound();
?>