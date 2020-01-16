<?php include('../includes/topnav.php'); ?>


<div class="container" style="width: 90%; max-width: 900px; background-color: white; border: none">
    <div>
        <div class="php-message">
            <div class="loader" style="text-align: center; margin: 0 auto"></div>
            <br>
            <?php
            //            echo "TEST1";
            if (!isset($_POST['submit'])) {
                echo "Something is wrong with the page. <br> ";
                echo "Redirecting you to HBDI homepage.";

                ?>
                <script>
                    setTimeout("location.href='../index.html';",2000);
                </script>
                <?php

                exit();

            } else {
                $email = $_POST['email'];
                $password = $_POST['password'];
                echo $email;
                echo $password;


                $stmt = $pdo->prepare("SELECT id_user, username, password, email FROM user WHERE email = '$email' ");
                $stmt->execute();
                $result = $stmt->fetch();
                $hash = $result['password'];
                $isValid = password_verify("aaa", "$hash");
                if (empty($result)) {
                    echo "Email not found. Redirecting to the sig-in page...";
                    echo '<meta http-equiv=REFRESH CONTENT=2;url=login.php>';
                } elseif (!$isValid) {
                    echo "Password incorrect. Please try again...";
                    echo '<meta http-equiv=REFRESH CONTENT=2;url=login.php>';
                } else {
                    $_SESSION['email_hbdi'] = $result['email'];
                    $_SESSION['username_hbdi'] = $result['username'];
                    $_SESSION['uid_hbdi'] = $result['id_user'];
                    //            $email_hbdi = $_SESSION['email_hbdi'];
                    //            $username_hbdi = $_SESSION['username_hbdi'];
                    //            $uid_hbdi = $_SESSION['id_user'];
                    echo " <div> <span>" . $result['username'] . " is logged in successfully. </span> </div>>";

                    if (isset($_SESSION["login_redirect"])) {
                        echo "Redirecting to the referral page...";
//                header("Location: " . $_SESSION["login_redirect"]);
                        echo '<meta http-equiv=REFRESH CONTENT=2;url=' . $_SESSION["login_redirect"] . '>';
                        // And remember to clean up the session variable after
                        // this is done. Don\'t want it lingering.
                        unset($_SESSION["login_redirect"]);
                    } else {
                        echo "Redirecting to your dashboard...";
                        echo '<meta http-equiv=REFRESH CONTENT=2;url=' . $p . '/dashboard.php>';
                    }
                    exit;
                }
            }
            ?>
        </div>
    </div>
</div>