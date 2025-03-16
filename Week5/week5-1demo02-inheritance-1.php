<?php
class Rectangle {
    protected $height ;
    protected $width ;
    function __construct( $height , $width ) {
        $this->height = $height ;
        $this->width = $width ;
    }
    function area() {
        return $this->width * $this->height ;
    } 
}
class Square extends Rectangle {
    function __construct ( $size ) {
        parent::__construct ($size , $size );
    } 
}
$rt1 = new Rectangle(3,4);
echo "The area = " . $rt1->area() . "\n" ;
$sq1 = new Square(5);
echo "The square area = " . $sq1->area() . "\n" ;
 

?>