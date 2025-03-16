<!DOCTYPE html>
<html>
<body>

<?php
function print_form ($fn , $ln, $email ) {                          
?>
    <form action ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = GET ">
    <label > First Name : <input type =" text " name ="f" value =" <?php echo $fn ?>">
    </label ><br >
    <label > Last Name:<input type =" text " name ="l" value =" <?php echo $ln ?>">
    </label ><br >
        Name: <input type="text" name="name" value ="<?php echo $fn ?>"><br>
        E-mail: <input type="text" name="email" value ="<?php echo $email ?>"><br>
    <input type =submit name =" submit " > <!--input type =reset -->
    </ form >
<?php
}
print_form (" ray ","Hay", "alice@exmaple.com");
?>

</body>
</html>