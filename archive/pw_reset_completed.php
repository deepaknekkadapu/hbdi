<?php include "../includes/topnav.php" ?>

<?php
// take new password posted from pw_reset.php
// update user's password.
?>

<div class="container-fluid" id="divUserElement">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">


            <?php
            if (isset($_POST['reset_password']) && $_POST['email'] && $_POST['password']) {
//                echo "test";
                $email = $_POST['email'];
                $pass = $_POST['password'];
//                echo $pass;

                $pass_hash = password_hash($pass, PASSWORD_DEFAULT);
//                echo $pass_hash;

                $stmt = $pdo->prepare("UPDATE user SET password='$pass_hash' WHERE email='$email'");
                $stmt->execute();
//                echo $stmt->rowCount() . " record(s) updated successfully";

                echo "Your password is updated. \n Taking you to the login page...<br>";
                echo '<meta http-equiv=REFRESH CONTENT=3;url=./login.php>';
            }

            ?>


        </div>
        <div class="col-sm-2"></div>
    </div>
</div>

