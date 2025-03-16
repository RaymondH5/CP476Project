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
    <button type="submit"> Click Me</button> 
    </form >
<?php
    }
   print_form (" Peter ","Pan");
?>
</body>
</html>