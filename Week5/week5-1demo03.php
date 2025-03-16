<?php 
class TestP1 {
    function example(...$args)
    {
        $retV = count($args);
        return $retV;         
    }

}
$obj = new TestP1();
$rt1 = $obj->example(1, 2);
echo $rt1 . "\n";
$rt2 = $obj->example(1, 2, 3, 4, 5, 6, 7);
echo $rt2 . "\n";

?>