<?php include '../includes/topnav.php' ?>


<div class="container-fluid" id="divUserElement">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-7">


            <?php
            //            if (!empty($_SESSION['email_hbdi']))
            //                echo "You are updating your password.";
            //                echo '<meta http-equiv=REFRESH CONTENT=3;url=../index.php>';
            //            } else {
            if (isset($_POST['submit'])) {
                $email_requester = $_POST['email'];
            }
            //            }

            //            global $conn;  // global vars not encouraged
            ///// password update email function: Token
            //            function passwd_verify($email_db, $conn)    /// pass $conn. it's not global
            //            {
            //                /// generate token ==> password
            //                $token = substr("abcdefghijklmnopqrstuvwxyz", mt_rand(0, 25), 1) . substr(md5(time()), 1);
            //                $pass_hash = password_hash("$token", PASSWORD_DEFAULT);
            ////                echo $pass_hash . "<br>"; /// tested: good
            //                /// save token to mysql (UPDATE to replace passwd)
            //                try {
            ////                    global $conn;
            ////                    echo $email_db;
            ////                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //                    $sql = "UPDATE user SET password = '$pass_hash' WHERE email = '$email_db' ";
            //                    $stmt = $conn->prepare($sql);
            //                    $stmt->execute();
            ////                    echo $stmt->rowCount() . "records updated successfully";
            ////                    echo "Sucess";
            //                } catch (Exception $e) {
            //                    echo $e;
            //                }
            //            }

            ///// verifying email exists

            $stmt = $pdo->prepare("SELECT email, username FROM user WHERE email = '$email_requester' ");
            $stmt->execute();
            $result = $stmt->fetch();
            $email_db = $result['email'];
            $username_db = $result['username'];
            if ($email_requester == $email_db) {
                echo nl2br("<div class='php-message'> <span style='text-align: left; width: 200px'> " . "Hi, " . $username_db . "\n" .
                    "A password reset email is sent to " . $email_db . ". \n Check your Spam folder if you don't see the email. " . "</span> </div> <br>");
//                    echo "Hi, " . $username . ", password update feature in development...<br>";
//                    passwd_verify($email_db, $conn);
                $token = substr("abcdefghijklmnopqrstuvwxyz", mt_rand(0, 25), 1) . substr(md5(time()), 1);
                $pass_hash = password_hash("$token", PASSWORD_DEFAULT);
//                echo $pass_hash . "<br>"; /// tested: good
                /// save token to mysql (UPDATE to replace passwd)
                $sql = "UPDATE user SET password = '$pass_hash' WHERE email = '$email_db' ";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
//                    echo $stmt->rowCount() . "records updated successfully";
//                    echo "Sucess";

                // TODO: if this works, go on; or give error message
                ///// create link for the email

//                echo "<div class='php-message'> <span style='text-align: left'>" . "Password reset email is arriving in couple of minutes.</span> </div><br>";


//                    echo "Come back to update your password later.<br>";
                echo '<meta http-equiv=REFRESH CONTENT=5;url=login.php>';

            } else {
                echo "Email does not exist. Redirecting you to homepage...";
                echo '<meta http-equiv=REFRESH CONTENT=5;url=../index.php>';
            }


            /// send email with token link
            $link = "<a href='tychen.us/hbdi/user/pw_reset_process.php?key=" . $email_db . "&reset=" . $pass_hash . "'> Click to reset password</a>";
            /// http://talkerscode.com/webtricks/password-reset-system-using-php.php
            try {
                // the headers: https://stackoverflow.com/questions/28026932/php-warning-mail-sendmail-from-not-set-in-php-ini-or-custom-from-head
                $headers = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'From: admin@hbdi<tychen@bashnet.us>' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

                // the message
                $msg = "
                DO NOT reply to this email. Contact your instructor or TA for questions. <br><br>
                Please click on the link to reset your password: $link. <br>
                
                If the link is not working for you, please copy and paste the URL below
                and paste to the address bar of your browser and hit enter to reset your password:<br>
                   http://tychen.us/hbdi/user/pw_reset_process.php?key=$email_db&reset=$pass_hash
                    ";

                // use wordwrap() if lines are longer than 70 characters

                $msg = wordwrap($msg, 70);

                // send email
                mail("$email_db", "HBDI: Reset Password", "$msg", "$headers");
            } catch (Exception $exception) {
                echo $exception;
            }
            /// click link to login with token (i.e., the passwd)
            /// after logged in, update password
            /// new password saved
            ?>


        </div>
        <div class="col-sm-2"></div>
    </div>
</div>
