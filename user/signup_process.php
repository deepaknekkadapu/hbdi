<?php
include('../includes/includes.php');
?>

<?php
if (isset($_SESSION['email_hbdi'])) {
    echo '<meta http-equiv=REFRESH CONTENT=0;url=../dashboard.php>';
} else {

    ?>


    <div class="container">
        <div class="row">


            <div style="padding-top: 100px; margin: 0 auto; text-align: center">
                <h3> Signing You Up </h3>
                <?php
                $fname = $_POST["name_first"];
                $lname = $_POST["name_last"];
                $username = $_POST["username"];
                $email = $_POST["email"];
                $pwd1 = $_POST['password1'];
                $pwd2 = $_POST["password2"];
                $affiliation = $_POST["affiliation"];

                // https://www.w3schools.com/php/php_form_required.asp

                try {
                    if (empty($email)) {
                        echo "Email is required." . "<br>";
                        echo '<meta http-equiv=REFRESH CONTENT=5;url=signup.php>';
                    } elseif (empty($pwd1) || empty($pwd2)) {
                        echo "Both passwords are required." . "<br>";
                        echo '<meta http-equiv=REFRESH CONTENT=10;url=signup.php>';
                    } elseif ($pwd1 != $pwd2) {
                        echo "Passwords must match." . "<br>";
                        echo '<meta http-equiv=REFRESH CONTENT=10;url=signup.php>';
                    } elseif (empty($username)) {
                        echo "Username is required." . "<br>";
                        echo '<meta http-equiv=REFRESH CONTENT=10;url=signup.php>';
                    } elseif (empty($fname)) {
                        echo "First name is required" . "<br>";
                        echo '<meta http-equiv=REFRESH CONTENT=10;url=signup.php>';
                    } elseif (empty($lname)) {
                        echo "Last name is rerquired" . "<br>";
                        echo '<meta http-equiv=REFRESH CONTENT=10;url=signup.php>';
                    } elseif (empty($affiliation)) {
                        echo "Affiliation is required" . "<br>";
                        echo '<meta http-equiv=REFRESH CONTENT=10;url=signup.php>';
                    } else {
                        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                            echo "Email (" . $email . ") format incorrect. " . "<br>";
                            echo '<meta http-equiv=REFRESH CONTENT=10;url=signup.php>';
                            exit("Redirecting...");
                        } elseif (!preg_match('/^[a-zA-Z_\-0-9]+$/', $username)) {
                            echo "Only letters and numbers are allowed in User Name." . "<br>";
                            echo '<meta http-equiv=REFRESH CONTENT=10;url=signup.php>';
                            exit("Redirecting...");
                        } elseif (!preg_match("/^[a-zA-Z_\-]+$/", $fname)) {
                            echo "Only letters are allowed in First Name." . "<br>";
                            echo '<meta http-equiv=REFRESH CONTENT=10;url=signup.php>';
                            exit("Redirecting...");
                        } elseif (!preg_match("/^[a-zA-Z_\-]+$/", $lname)) {
                            echo "Only letters are allowed in Last Name." . "<br>";
                            echo '<meta http-equiv=REFRESH CONTENT=10;url=signup.php>';
                            exit("Redirecting...");
                        }
                    }


                    $pass_hash = password_hash($pwd1, PASSWORD_DEFAULT);
//        echo $password;
                    $result = $pdo->query("SELECT email FROM user WHERE email = '$email' ");
                    if ($result->rowCount() > 0) {
                        echo "This email address is taken." . "<br>";
                        echo '<meta http-equiv=REFRESH CONTENT=10;url=signup.php>';
                        exit("Redirecting...");
                    } else {
                        try {
                            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $sql = "INSERT INTO user (email, password, username, name_first, name_last, affiliation, id_affiliation ) VALUES ( '$email', '$pass_hash', '$username', '$fname', '$lname' , '$affiliation', '$id_affliation') ";
                            $pdo->exec($sql);

                            echo 'HBDI account created. Redirecting you to the login page... ';
                            echo '<meta http-equiv=REFRESH CONTENT=3;url=login.php>';
                            exit();

                        } catch (PDOException $e) {
                            echo "Account not created. <br> Please try signing up again. ";
                            echo "The error message is as below:" . "<br>" . $e->getMessage();
                            echo '<meta http-equiv=REFRESH CONTENT=10;url=signup.php>';
                        }
                    }

                } catch (Exception $e) {
                    echo "error!";
                    echo $e;
                }
                ?>
            </div>

            <!-- ////// Back Home ////// -->

            <br> <br>
            <button type="submit" class="btn" id="divUserButton"
                    onclick="location.href='login.php' ">Log in
            </button>
            <button type="submit" class="btn" id="divUserButton"
                    onclick="location.href='signup.php' "> Sign Up
            </button>
            <button type="button" class="btn" id="divUserButton"
                    onclick="location.href='../index.php' ">Home
                <!--</button>-->
        </div>

    </div>


    <?php
} ?>
