<?php

// Global variable (accessible from anywhere)
$globalVar = "I am global!";

// Class definition
class ScopeExample {
    // Properties with different access modifiers
    public $publicVar = "I am public!";
    private $privateVar = "I am private!";
    protected $protectedVar = "I am protected!";

    // Method to access the public variable
    public function getPublicVar() {
        return $this->publicVar;
    }

    // Method to access the private variable (inside the class)
    public function getPrivateVar() {
        return $this->privateVar;
    }

    // Method to access the protected variable (inside the class)
    public function getProtectedVar() {
        return $this->protectedVar;
    }

    // Method to access the global variable
    public function getGlobalVar() {
        global $globalVar; // Accessing the global variable
        return $globalVar;
    }
}

// Creating an object of the class
$obj = new ScopeExample();

// Accessing and printing the public variable directly
echo "Public Variable: " . $obj->getPublicVar() . "<br>";

// Accessing the private variable using a class method (allowed within the class)
echo "Private Variable: " . $obj->getPrivateVar() . "<br>";

// Accessing the protected variable using a class method (allowed within the class)
echo "Protected Variable: " . $obj->getProtectedVar() . "<br>";

// Accessing the global variable inside the class method
echo "Global Variable: " . $obj->getGlobalVar() . "<br>";

// The following will cause an error as $privateVar and $protectedVar are not accessible outside the class
// echo "Direct Private Variable: " . $obj->privateVar . "<br>"; // Error
// echo "Direct Protected Variable: " . $obj->protectedVar . "<br>"; // Error

?>
