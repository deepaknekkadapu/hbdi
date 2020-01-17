<?php include '../includes/topnav.php' ?>

<?php
if (!isset($_SESSION['email_hbdi']) or
    !isset($_SESSION['username_hbdi']) or
    !isset($_SESSION['uid_hbdi'])) {
    ?>
    <div class='php-message'>
        <div class='loader' style='text-align: center; margin: 0 auto'></div>
        <br>
        <div style='text-align: center'> You are not logged in.</div>
        <div style='text-align: center'> Redirecting to login page...</div>
    </div>
    <?php
    $_SESSION['login_redirect'] = $_SERVER['PHP_SELF'];
    echo '<meta http-equiv=REFRESH CONTENT=1;url=./login.php>';
    exit();
} else {
    $email_hbdi = $_SESSION['email_hbdi'];
    $username_hbdi = $_SESSION['username_hbdi'];
    $uid_hbdi = $_SESSION['uid_hbdi'];
    ?>

    <div id="divUserElement">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <?php
                if (isset($_POST['submit'])) {
                    $email = $_POST['email'];
                    $username = $_POST['username'];
                    $name_first = $_POST['name_first'];
                    $name_last = $_POST['name_last'];

                    if (empty($username)) {
                        echo "Username is required." . "<br>";
                        echo '<meta http-equiv=REFRESH content=2;url=edit_account.php>';
                    } elseif (empty($name_first)) {
                        echo "First name is required" . "<br>";
                        echo '<meta http-equiv=REFRESH content=2;url=edit_account.php>';
                    } elseif (empty($name_last)) {
                        echo "Last name is rerquired" . "<br>";
                        echo '<meta http-equiv=REFRESH content=2;url=edit_account.php>';

                    } else {
                        echo "<div class='php-message'>" . "Checking characters..." . "</div>";
                        if (!preg_match('/^[a-zA-Z_\-0-9]+$/', $username)) {
                            echo "Only letters and numbers are allowed in User Name." . "<br>";
                            echo '<meta http-equiv=REFRESH content=2;url=edit_account.php>';
                            exit("Aborting...");
                        } elseif (!preg_match("/^[a-zA-Z_\-]+$/", $name_first)) {
                            echo "Only letters are allowed in First Name." . "<br>";
                            echo '<meta http-equiv=REFRESH content=2;url=edit_account.php>';
                            exit("Aborting...");
                        } elseif (!preg_match("/^[a-zA-Z_\-]+$/", $name_last)) {
                            echo "Only letters are allowed in Last Name." . "<br>";
                            echo '<meta http-equiv=REFRESH content=2;url=edit_account.php>';
                            exit("Aborting...");
                        } else {
                            $sql = "UPDATE user SET username='$username', name_first='$name_first', name_last='$name_last' WHERE id_user='$uid_hbdi'";
                            $stmt = $pdo->prepare($sql);
                            $stmt->execute();
                            echo "<div class='php-message'>" . $stmt->rowCount() . " record(s) updated successfully" . "</div>";
                            echo '<meta http-equiv=REFRESH content=2;url=', $p, '/dashboard.php>';
                        }
                    }
                } else {
                    echo "Information not submitted. ";
                }
                ?>

            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>
<?php } ?>