<html>
<body>
<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="GET">
Name: <input type="text" name="name"><br>
E-mail: <input type="text" name="email"><br>
<input type="submit">
</form>
</body>
</html>
// step 1 from web browser visit 
//                  http://localhost/CP476ADemos/week4-2demos/week4-2demo7.php
// step 2 append the following to the above URL
//                  /%22%3E%3Cscript%3Ealert('hacked')%3C/script%3E
// step 3 enter