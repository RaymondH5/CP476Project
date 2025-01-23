<?php
    class Vis{
        global $publicVar =1;
        private $privateVar = 2;
        protected $protectVar =3;
        public function pubFc(){echo $GLOBALS['publicVar'];}
        private function priFc() {}

    }
    $v = new Vis();
    echo $v->pubFc();
?>