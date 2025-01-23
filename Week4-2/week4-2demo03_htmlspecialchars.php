<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Echo user input (vulnerable example)
    echo $_POST["user_input"];
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  <input type="text" name="user_input">
  <input type="submit">
</form>