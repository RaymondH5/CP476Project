<?php
    // demo for step by step debugging without XDebug
    $num = array("Lunshan","Gao","Canada","Waterloo"); //create an array
    //cast an array to object
    $obj = (object)$num; //change array to stdClass object

    print_r($obj); //stdClass Object created by casting of array

    $newobj = new stdClass();//create a new object
    $newobj->name = "Finman";
    $newobj->work = "ShopperDrug";
    $newobj->address="Cambridge, ON.";
    $newobj->phonenumber =416;

    $new = (array)$newobj;//convert stdClass to array
    print_r($new); //print new object

 
?>