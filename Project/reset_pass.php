<?php

declare(strict_types=1);

require 'DAL.php';
include 'header.php';

?>
<main>
    <section class="hero">
        <div class="full-screen-container">
            <div class="form-container">
                <form id="login_form" method="post">
                    <h1 style="color: black;">Reset your password</h1>
                    <br>
                    <div class="input-group">
                        <input type="password" id="old_password" name="old_password" placeholder="Old password" required>
                    </div>
                    <div class="input-group">
                        <input type="password" id="new_password" name="new_password" placeholder="New Password" required>
                    </div>
                    <div class="input-group">
                        <button id="button_login" class="center">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
<main>
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    if (isset($_POST['old_password']) && isset($_POST['new_password'])) {

        $oldcleaned = htmlspecialchars($_POST['old_password']);
        $newcleaned = htmlspecialchars($_POST['new_password']);

        $conn = OpenConnection();
        $id = $_COOKIE['user_id'];
        $stmt = $conn->prepare("SELECT password_hash FROM users WHERE user_id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $original_password_hash = $row['password_hash'];
        $stmt->close();

        if(password_verify($oldcleaned, $original_password_hash)) {
            resetPassword($newcleaned, $id); // Pass sanitized password inputs
        }
        else {
            echo '<script>alert("Old Password is Incorrect");</script>';
        }
    }
    else {
        echo '<script>alert("All fields are required. Please fill in the missing fields.");</script>';
    }
}


include 'footer.php';

?>