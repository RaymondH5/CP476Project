<?php
echo "Filename: " . $_FILES['userfile']['name']."<br>";
echo "Type : " . $_FILES['userfile']['type'] ."<br>";
echo "Size : " . $_FILES['userfile']['size'] ."<br>";
echo "Temp name: " . $_FILES['userfile']['tmp_name'] ."<br>";
echo "Error : " . $_FILES['userfile']['error'] . "<br>";
?>