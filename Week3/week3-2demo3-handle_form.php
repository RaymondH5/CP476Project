<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Feedback Form</title>
</head>
<body>
<?php //Script 3.1 handle_form.php
//var_dump($_GET);
//var_dump($_REQUEST);
//create shorthand versions of the variables:
$title=$_GET['title'];
$name=$_GET['name'];
$response=$_GET['response'];
$comments=$_GET['comments'];
//print the received data 
print "<p>Thank you, $title $name, for your comments.</p>
<p>You stated that you found this example to be '$response' and added:<br>$comments</p>";
?>
</body>
</html>