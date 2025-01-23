<?php
// Starting session
session_start();
 
?>
<!DOCTYPE html>
<html>
  <body>
    <?php 
      //Using session variables to set a session
      $_SESSION["name"] = "LunshanGao";
      $_SESSION["hobby"] = "writing";
      
      echo "Successfully set the session variables.";
	  echo "\n";
	  echo $_SESSION["name"];
    ?>
  </body>
</html>