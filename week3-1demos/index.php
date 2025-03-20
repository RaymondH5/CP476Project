DEMO 1

<?php
header('Content-type: text/plain');
function testFunction() {
    static $count = 0;
    $count++;
    echo $count;
}
testFunction();
testFunction();
testFunction();
?>

<?php
class Person {
    function greet() 
    {
        echo "Hello, World!";
    }
}
$Ben = new Person();
$Ben->greet();  
echo "\n";
$a = array();
echo $a != null;
echo 20 . 3;
?>

<?php
// Creating an indexed array with the given elements
$fruits = array("apple", "glass\\table", "peach", "tangerine");

// Print the array to verify the elements
print_r($fruits);
?>


<?php
echo 'hello';
Print 'don\'t';
echo ("glass\table");
?>

<?php

$emp = array(
    array(1, "sonoo", 400000),
    array(2, "john", 500000),
    array(3, "rahul", 300000)
);

for ($row = 0; $row < 3; $row++) {
    for ($col = 0; $col < 3; $col++) {
        echo $emp[$row][$col] . " ";
    }
    echo "\n";
}
?>

<?php
// Creating an associative array with the given elements
$person = array(
    "firstName" => "Peter",
    "lastName" => "Smith",
    "address" => "777 King Street",
    "city" => "Waterloo"
);

// Print the associative array to verify the elements
print_r($person);
?>
<br>

<?php
// Using the ceil function to round numbers up
$result1 = ceil(7.3); // ceil rounds 7.3 up to 8
$result2 = ceil(7.7); // ceil rounds 7.7 up to 8

// Using the floor function to round numbers down
$result3 = floor(7.2); // floor rounds 7.2 down to 7
$result4 = floor(7.8); // floor rounds 7.8 down to 7

// Print the results to see the outputs
echo "ceil(7.3) = " . $result1 . "\n";
echo "ceil(7.7) = " . $result2 . "\n";
echo "floor(7.2) = " . $result3 . "\n";
echo "floor(7.8) = " . $result4 . "\n";
?>

<br>

<?php
$var1 = 0;
$var3 =log($var1);
print $var3;
$var2 = -1.0;
$var = sqrt($var2);
print $var;
?>

<br>

<?php
$var1 = 6;
if($var1 > 4 && $var1 < 7)
{
    print true;
}
else
{
    print "0\n";
}
?>

<br>

<?php
$string_var = "string value for php type";
$int_var = (array)$string_var;
var_dump($int_var);
?>

<br>

<?php
define ("ANIMALS" ,[" bird "," cat"," dog" ]);
define ("PI" ,3.14159);
echo PI;
echo "\n";
echo ANIMALS[1];
?>

<br>
<br>
DEMO 2
<br>
<br>

<?php
$var = 123 == "123";
print $var . "\n";
$var1 = 5 == TRUE;
echo $var1;
?>

<br>

<?php
$var1 = "ABD" > 'ABC';
$var2 = "1.23e2" < "12.3e1";
echo $var1;
echo "\n";
echo $var2;
echo "\n";
$var3 = "F1" < "G2";
echo $var3;
?>

<br>

<?php
//$v1 = "abd";
//$v2 = "abc";
$var1 = strcmp("abd", "abc");
echo $var1;
echo "\n";
$var2 = 'ABD' <=> 'ABC';
echo $var2;
?>

<p>----------------------------- </p>

<?php
 $var1 = is_nan(sqrt(-1));
 echo $var1;
 echo "\n";
 $var2 = is_infinite(log(0));
 print $var2 . "\n";
?>

<br>

<?php
   $age = ["John"=>"18", "Mike"=>"20", "Jack"=>"21"];
   echo "Mike is " . $age['Mike'] . " years old.";
?>

<br>

<?php
   $person = ["name"=>"John", "address"=>array("city"=>"Waterloo city,", "state"=>"ON", "street"=>"16 King Rd."), "Phone"=>"216-178-1234"];
   echo $person['name'] . " lives at " . $person["address"]["street"] . 
            $person['address']['city'] . " " . $person["address"]["state"] . ".";
?>

<br>

<?php
$array1 = array("Peter", "Paul", "Mary", "Melissa");
$key1 = array_keys($array1);
print_r($key1);
$ab = array("name"=>'Mike', "gender"=>'male', "ID"=>1234567);
$key2 = array_keys($ab);
print_r($key2);
?>

<br>

<?php
$array1 = array("Peter", "Paul", "Mary", "Max");
$value = array_values($array1);
print_r($value);
$ab = array("name"=>"bake", "gender"=>'male', "ID"=>1234567);
$val = array_values($ab);
print_r($val);
?>

<br>

<?php
$arr1 = array (1 => " Peter ", 3 => 2009 , "a" => 101);
$var1 = array_key_exists ("a", $arr1);
echo $var1;
echo "\n";
echo $arr1[3];
echo "\n";
$var2 = array_key_exists ("c", $arr1);
echo $var2;
?>

<br>

<?php
$colors = array("red", "green", "blue", "yellow");

foreach ($colors as $valueX) {
  echo "$valueX ";
}

?>

<br>

<?php
  $array1= array (" Peter ", " Paul ", " Mary "); 
  foreach ($array1 as $keyY => $value )
	  print "The  array   maps   $keyY  to  $value \n";
?>

<br>

<?php
//array push
$stack = array("orange", "banana");
array_push($stack, "apple", "raspberry");
print_r($stack);
// array pop
$stack = array("orange", "banana", "apple", "raspberry");
$fruit = array_pop($stack);
print_r($stack);

?>

<br>

<?php
//shift
$stack = array("orange", "banana", "apple", "raspberry");
$fruit = array_shift($stack);
print_r($stack);
//unshift
$queue = array("orange", "banana");
array_unshift($queue, "apple", "raspberry");
print_r($queue);

?>

<br>
<br>

DEMO 3

<br>
<br>

<?php
$t = date("H");     
if ($t < "20") {
  echo "Have a good day!";
} else {
  echo "Have a good night!";
}
?>

<br>

<?php
    $d = "Fri";
    if($d == "Fri"){
        echo "Have a nice weekend!";
    }elseif($d == "Thu"){
        echo "Have a nice Thursday!";
     } elseif($d == "Sun"){
        echo "Have a nice Sunday!";
    } elseif($d=="Sat"){
        echo "Have a nice Saturday!";
    } else{
        echo "Have a nice day!";
    }
?>

<br>

<?php
$v = 1;
$r = (1 == $v) ? 'Yes' : 'No'; // $r is set to 'Yes'
print "$r \n";
$r = (3 == $v) ? 'Yes' : 'No'; // $r is set to 'No'
print "$r \n";
echo (1 == $v) ? 'Yes' : 'No';
?>

<br>

<?php
$today = date("D");
switch($today){
    case "Mon":
        echo "Today is Monday.";
        break;
    case "Tue":
        echo "Today is Tuesday.";
        break;
    case "Wed":
        echo "Today is Wednesday. ";
        break;
    case "Thu":
        echo "Today is Thursday. ";
        break;
    case "Fri":
        echo "Today is Friday. ";
        break;
    case "Sat":
        echo "Today is Saturday. ";
        break;
    case "Sun":
        echo "Today is Sunday. ";
        break;
    default:
        echo "No information available for that day.";
        break;
}
?>

<br>

<?php
$x = 1;
while($x <= 5) {
     echo "The number is: $x \n";
     $x++;
}
?>

<br>

<?php
$x = 1;
do {
  	echo "The number is: $x \n";
  	$x++;
} while ($x <= 5);

?>

<br>

<?php
$x = 1;
while($x < 1) {
     echo "The number is (While): $x \n";
     $x++;
}
$x = 1;
do {
  	echo "The number is(do-while): $x \n";
  	$x++;
} while ($x < 1);
?>

<br>

<?php
//Demo 8- for loop
for ($x = 0; $x <= 5; $x++) {
  	echo "The number is: $x \n";
}
?>

<br>

<?php
//----------- for -------------
$arr = array(1, 2, 3, 4, 5);
 // Looping over array
for($i = 0; $i < 5; $i++) {
     echo($arr[$i] . "  ");
}
echo "\n";
//---------- foreach -------------
$arr = array(1, 2, 3, 4, 5);
// Looping over array
foreach($arr as $val){
    echo($val . "  ");
}
?>

<br>

<?php
    //declaration - definition
    function familyName($fname, $lname) {
        echo "$fname $lname.\n";	 
    }
    //execution
    familyName("Jami", "Hey");
?>

<br>

<?php
    $var1 = square(4);
    function square($num):int
    {
	    return $num * $num;
    }

    echo $var1;
?>

<br>

<?php
//declare(strict_types=1);
function sum(int $x, int $y): int {
    $z = $x + $y;
    return $z;
}

$retV =sum(4,4);
echo $retV;
?>

<br>

<?php
//Demo 13- output control

    ob_start();
	echo "This content will not be sent to the browser.";
    //ob_end_clean();
    ob_flush(); 
?>

<br>
<br>

DEMO 4

<br>
<br>

<?php
    //Demo 1 - default parameter
    // function declaration
    function setHeight(int $minheight =50 ) {
 	    echo "The height is : $minheight  \n";
    }
    setHeight(350);

    SETheigHT(); // function name is not case sensitive

?>

<br>

<?php
    //Demo 1-1 - global key word
    $x = 75;
    $y = 25;
    functioN addition() {
        $x=10;
	    globAl $y;
        //$x=10;
        globaL $z;
        //
        $z = $x + $y;
        $GLOBALS['o1'] = $GLOBALS['x'] + $GLOBALS['y'];
    }
    addition();
    echo $z;
    echo "\n";
    echo $o1;
?>

<br>

<?php
    //Demo 2 - static variable

    function counter () { 
	    static $count = 0; 
	    return $count++;  // ++count;
    }
    echo "static  \$count  = ",counter(),"\n";
    echo "static  \$count  = ",counter(),"\n";
    echo "static  \$count  = ",counter(),"\n";
?>

<br>

<?php
    // Demo 2-1 - static methods

    class greeting {
        public static function welcome() {
            echo "Hello World! \n";
        }  
    }
    greeting::welcome();
    $grt = new greeting; 
    $grt->welcome();

    function counters(){
        static $cnt=0;
        $cnt++;
        return $cnt; 
    }
    $var1 = counters();
    echo "$var1 \n";
    $var2 = counters();
    echo "$var2 \n";
?>

<br>

<!DOCTYPE html>
<html>
<body>

<h1>My First Form</h1>

<?php
    function print_form ($fn , $ln ) {                          
?>
    <form action =" process_form.php " method = POST ">
    <label > First Name : <input type =" text " name ="f" value =" <?php echo $fn ?>">
    </label ><br >
    <label > Last Name:<input type =" text " name ="l" value =" <?php echo $ln ?>">
    </label ><br >
    <input type =" submit " name =" submit " value =" Submit "> <input type =reset ></ form >

<?php
    }
   print_form (" Peter ","Pan");
?>
</body>
</html>

<br>

<?php
    //Demo 4 - passing reference

    function add_five(&$value) {
        $value += 5;
    }
    $num = 2;
    add_five($num);
    echo $num;

?>

<br>

<?php

    //Demo 5 - variable number of parameters

    function sumer (... $numbers ) {
        if ( count ( $numbers ) < 1){
            return 0;
        } 
        $Val = 0;
        foreach ( $numbers as $value ) { 
            $Val += $value ; 
        }
        return $Val;
    }
    echo sumer(0 ,1 ,2 ,3) , "\n";
    echo sumer(0, TRUE ,"2" ,3e0, 4), "\n";

?>

<br>

<?php
    //Demo 6 - anonymous functions

    $funcs = [ function ($x,$y) { return 2*( $x+$y ); }, 
               function ($x,$y) { return 3+( $x+$y ); }];
    foreach ( $funcs as $func ) {
        echo $func (5,3) ,"\n";
    }

    $funcs = array(function ($x,$y) { return 2*( $x+$y ); }, 
                   function ($x,$y) { return 3+( $x+$y ); });
    foreach ( $funcs as $func ) {
        echo $func (5,3) ,"\n";
    }
?>

<br>

<?php
    //Demo 6-1 - anonymous function

    $test = function($name)
    {
	    printf("Hello %s\r\n", $name);
    };
    $test("World");
    $test("PHP");

?>

<br>

<?php
    //Demo 7 - function as a parameter

    function apply ($f ,$x ,$y) {
        return $f($x ,$y );
    }
    function mult ($x ,$y) {
        return $x * $y;
    }
    echo apply ('mult' ,2,3),"\n";  
    echo mult(5, 8);
?>

<br>

<?php
    //declare(strict_types=1);
    //Demo 8 - strict type checking

    function mult5(int $x ): int 
    { 
	    return 5* $x;
    }
    echo mult5 (1) , "\n";
    echo mult5 ("1"), "\n";
    echo mult5 (1, 2) , "\n"

?>

<br>

<?php
    // Including file
    //include "D:\Winter2024\CP476\Apache24\phpfiles\myincludeFile.php";
    //require "D:\Winter2024\CP476\Apache24\phpfiles\myincludeFile.php";
    // Calling the function
    //multiplySelf(4); // Output: 16
    //echo "continue running OK! \n";
?>

<br>

<?php
    // Including file
    //require "D:\Winter2024\CP476\Apache24\phpfiles\myincludeFile.php";
    //require_once "D:\Winter2024\CP476\Apache24\phpfiles\myincludeFile.php";
    // Calling the function
    //multiplySelf(2); // Output: 4
    //echo "\n";

    // Including file
    //require "D:\Winter2024\CP476\Apache24\phpfiles\myincludeFile.php";
    //require_once "D:\Winter2024\CP476\Apache24\phpfiles\myincludeFile.php";
    // Calling the function
    //multiplySelf(5); 
    //echo "\n";
?>

<br>
<br>

DEMO 5

<br>
<br>

<?php

    //Demo 1 - global

    $x = 75;
    $y = 25;
    function additions() {
	    $x=10;
        $y = 0;
	    //$GLOBALS['z'] = $GLOBALS['x'] + $GLOBALS['y'];
        //$z = $x + $y;
        $GLOBALS["z"] = $GLOBALS["x"] + $GLOBALS["y"];
        global $z, $y;
        global $x;
        $z = $x + $y;
    }
    additions();
    echo $z;
?>

<br>

<?php
    //global variables

    $var1 =$_SERVER['PHP_SELF'];;
    print $var1;
    echo "\n";
    echo $_SERVER['SCRIPT_NAME'];
    echo "\n";
    //you can set the global variables
    $_SERVER["USER"] ="LunshanGao";
    echo $_SERVER["SERVER_PORT"];
?>

<br>

<?php
    //demo 4
    
    $_ENV["USER"] = "Gao";
    echo 'My username is '.$_ENV["USER"].'!';

?>