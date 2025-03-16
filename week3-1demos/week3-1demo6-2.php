<?php
$add = fn($valone,$valtwo) => $valone + $valtwo;
$ret =$add(1,2);
echo $ret . "\n";
//
//
$funcs = [ fn ($x,$y)=>2*( $x+$y ), fn($x,$y)=>3+( $x+$y )];
foreach ( $funcs as $func ) {
    echo $func (5,3) ,"\n";
}
?>