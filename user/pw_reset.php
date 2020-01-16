<?php include '../includes/topnav.php' ?>


<?php
// verify email
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$email = "";
if (isset($_POST['submit'])) {
//    if (!empty($_SESSION['email_hbdi'])) {
//        echo "<div class='php-message'> Note: You are logged in. <br> Log out and click login to reset password </div>";
//        echo '<meta http-equiv=REFRESH CONTENT=5;url=../index.php>';
//    } else {
    $email = $_POST['email'];
    if ((!isset($email)) OR (empty($email))) {
        echo "<div class='php-message'> Please input your email address... </div>";
        echo '<meta http-equiv=REFRESH CONTENT=1;url=pw_reset.php>';
        exit();
    } else {
        $email = test_input($email);
    }
//    }

//    check DB
    $stmt = $pdo->prepare("SELECT email, username FROM user WHERE email = '$email' ");
    $stmt->execute();
    $result = $stmt->fetch();
    $email_db = $result['email'];
    $username_db = $result['username'];
    if ($email == $email_db) {

//        generate a toekn
        $token = substr("abcdefghijklmnopqrstuvwxyz", mt_rand(0, 25), 1) . substr(md5(time()), 1);
        $pass_hash = password_hash("$token", PASSWORD_DEFAULT);
/// save token to mysql (UPDATE to replace passwd)
        $sql = " UPDATE user SET account_verify_token = '$pass_hash' WHERE email = '$email_db' ";
        $stmt = $pdo->prepare($sql);
        $true_false = $stmt->execute();
        if ($true_false == TRUE) {
            echo "<div class='php-message'> Your old password is replaed. </div>> ";
        } {

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
                DO NOT reply to this email. Contact the website administrator for support or questions. <br><br>
                Please click on the link to reset your password: $link. <br>
                
                If the link is not working for you, please copy and paste the URL below
                and paste to the address bar of your browser and hit enter to reset your password:<br>
                   http://tychen.us/hbdi/user/pw_reset_process.php?key=$email_db&reset=$pass_hash
                    ";

// use wordwrap() if lines are longer than 70 characters
            $msg = wordwrap($msg, 70);
// send email
            mail("$email_db", "HBDI: Reset Password", "$msg", "$headers");
// message user
            $msg = "
            <div class='php-message'> Hi, $username_db, <br>
                Reset email sent by admin@hbdi (tychen@bashnet.us) to $email_db. <br>
                Check your Spam folder if you don't see the email.</div> <br>";

            echo '<meta http-equiv=REFRESH CONTENT=5;url=login.php>';
        } catch (Exception $exception) {
            echo $exception;
        }
    } else {
        echo "<div class='php-message'> Email address is not found. <br> Redirecting you to homepage... </div>";
        echo '<meta http-equiv=REFRESH CONTENT=5;url=../index.php>';
    }


}
?>

<!--<script>-->
<!--    function myFunction() {-->
<!--        document.getElementById("password_reset").innerHTML = "--><?php //echo $msg; ?>//";
//    }
//</script>

<div class="container" style="width: 90%; max-width: 900px">
    <!-- beginning of pw request box -->

    <!--    HBDI WP Change Request Header -->
    <div class="box-wrap">
        <!--    HBDI log in Header -->
        <header class="box-header-wrap">
            <div class="box-header">
                <span> HBDI</span>
            </div>
            <div class="box-header2">
                <spsan> Reset Your Password</spsan>
            </div>
        </header>


        <section id="password_reset"
                 style="padding-top: 35px; margin: 0 auto; ; width: 280px ">

            <form name="form" method="post">
                <div style="margin-top: 90px">
                    <input type="text" name="email" placeholder="Email address"
                           value="" class="input_field">
                </div>

                <div style="text-align: left; padding-top: 10px">
                    The old password will be replaced. <br>
                    You will receive a password reset email. <br>
                </div>

                <div style=" margin-top: 35px">
                    <input type="submit" name="submit" class="input_field"
                           style="width: 75px" value="Submit">

                    <a href=<?php echo $p ?>/dashboard.php>
                           <span style="float:right; margin-top: 10px; border: 1px solid grey;
border-radius: 4px; height: 40px; width: 65px; padding: 8px 10px; text-decoration: none; color: black">
                             Cancel
                           </span>
                    </a>
                </div>
            </form>

        </section>

        <!--  Home and Create account-->
        <section style="margin-top: 45px; width: 400px; text-align: center; ">

            <div>
                <span><a href="#" style="float:left; text-decoration: none ">Create an HBDI account</a></span>

                <span><a href="../index.php"
                         style="float:right; text-decoration: none">Back to HBDI Home</a></span>

            </div>
        </section>
    </div>
</div>
</div>
<!-- End of Container-->


