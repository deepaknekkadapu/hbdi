<?php include('../includes/topnav.php'); ?>


<?php
if (isset($_POST['submit_login'])) {
    $email = test_input($_POST['email']);
    $password = $_POST['password'];
//    $password_hashed = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("SELECT id_user, username, password, email, name_first, activated FROM user WHERE email = '$email' ");
    $stmt->execute();
    $result = $stmt->fetch();
    $id_user = $result['id_user'];
    $username = $result['username'];
    $email = $result['email'];
    $name_first = $result['name_first'];
    $password_db = $result['password'];
    $isValid = password_verify($password, $password_db);
    $activated = $result['activated'];


    if ($activated != 1) {
        $activation_message = "This account is not activated.";
        echo "<div class='php-message'>$activation_message  <br> Redirecting... </div>";
        echo "<meta http-equiv=REFRESH CONTENT=5;url=$p/user/login.php>";
        exit();
        echo
            '<script type="text/javascript">' .
//'showMessage();' .
            '</script>';
    } else {
//        echo "ACTIVE";
        if (empty($result)) {
            echo "<div class='php-message'> Email address not found. Please check and try again... </div> ";
            echo "<meta http-equiv=REFRESH CONTENT=3;url=$p/user/login.php>";

        } elseif ($isValid != true) {
            echo "<div id='login_message'>Password incorrect. Please try again... </div>";
            echo "<meta http-equiv=REFRESH CONTENT=3;url=$p/user/login.php>";
        } else {
            $_SESSION['email_hbdi'] = $email;
            $_SESSION['username_hbdi'] = $username;
            $_SESSION['uid_hbdi'] = $id_user;
            $_SESSION['timestamp'] = time();

            echo "<div class='php-message'>
                <div class='loader' style='text-align: center; margin: 0 auto'></div> <br><br>";

            echo "<div style='padding-left: 30px'>";

            if (isset($_SESSION["login_redirect"])) {
                $login_referal = $_SESSION['login_redirect'];
                echo "

<div> $name_first is logged in successfully. <br>
                Redirecting to the referral page...</div>";
                echo "<meta http-equiv=REFRESH CONTENT=2;url=$login_referal>";
                unset($login_referal);
                unset($_SESSION["login_redirect"]);
            } else {
                echo "<div> $name_first is logged in successfully. <br>
                Redirecting to your dashboard..." . " </div > ";
                echo "<meta http-equiv=REFRESH CONTENT=2;url=$p/dashboard.php>";
            }
            echo "</div></div>";
            exit;
        }
    }
//    unset($_POST['submit']);

}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>


<!-- POST the form data to start log in-->
<?php
if (isset($_SESSION['email_hbdi'])) {
    echo "<div class='php-message'> You are already logged in <br>" .
        " Redirecting to your Dashboard. </div>";
    echo "<meta http-equiv=REFRESH CONTENT=3;url=$p/dashboard.php>";
} else {
    //    header('Content-type: text/plain; charset=utf-8');

    // create and validate variables
    $email = "";
    $email_error = "";
    $password = "";
    $password_error = "";
}
?>


<!-- beginning of sign in box -->

<div class="container" style="width: 90%; max-width: 900px">

    <div class="box-wrap">
        <!--    HBDI log in Header -->
        <header class="box-header-wrap">
            <div class="box-header">
                <span> HBDI</span>
            </div>
            <div class="box-header2">
                <spsan> Log in with your HBDI account</spsan>
            </div>
        </header>

        <!--instituion sign-->
        <section style="padding-top: 35px; margin: 0 auto; ; width: 280px ">

            <!--institution ID-->
            <div class="input_field">
                <!--institution icon-->
                <span>
                    <img style=" height: auto; padding: 5px 10px 0 10px;"
                         src="../images/fsu_32.png"
                         alt="FSU logo">
                </span>
                <span class="icon-text"> Log in with your institution ID </span>
                <div id="messageERR"></div>

        </section>

        <!-- OR -->
        <section style="margin-top: 15px;   ;">
            <div style="text-align: center;  color: darkgray; border: ; text-decoration: none ">
                OR
            </div>
        </section>

        <!--account log in(email & password)-->
        <section style=" margin-top: 5px; width: 280px;">
            <div id=""></div>
            <!--This will turn $_SERVER['REQUEST_METHOD'] to GET:-->
            <!--action = " <?php ////echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> " -->

            <form id="login_form" method="POST" onsubmit="return validate();">
                <div>
                    <input type="text" id="email" name="email"
                           placeholder="Email address"
                           class="input_field">
                    <div><span id="email_error"></span></div>
                </div>

                <div>
                    <input type="text" id="password" name="password"
                           placeholder="Password"
                           class="input_field">
                    <div><span id="password_error"></span></div>
                </div>

                <div>
                    <input type="submit" id="submit" name="submit_login"
                           class="input_field"
                           style="width: 75px"
                           value="LOG IN">
                    <span>
                            <a style="float:right; padding-top: 20px; text-decoration: none; color: dimgrey"
                               href="pw_reset.php"> Forget password&#63;
                            </a>
                        </span>
                    <span id="login_message"></span>
                </div>
            </form>
        </section>

        <section style="margin-top: 45px; width: 400px; text-align: center; ">
            <div>
                <span><a href="signup.php"
                         style="float:left; text-decoration: none; color: dimgrey "> Create an HBDI account </a></span>
                <span><a href="../index.php"
                         style="float:right; text-decoration: none; color: dimgrey"> Back to HBDI Home </a></span>
            </div>
        </section>
    </div>
    <!--End of log in box-->
</div>
<!-- end of Container   -->


<div style="display: none"><a
            href="http://talkerscode.com/webtricks/validate%20the%20form%20data%20before%20and%20after%20submitting%20the%20form.php"></a>
</div>


<script type="text/javascript">
    function validate() {
        submit = true;
        var email_error = ""
        var email = document.getElementById('email');
        if (email.value === "" || email.value.indexOf("@") === -1 || email.value.indexOf(".") === -1) {
            email_error = "Please provide a valid email address.";
            document.getElementById("email_error").innerHTML = email_error;
            submit = false;
        }
        // else {
        var password_error = "";
        var password = document.getElementById('password');
        if (password.value === "") {
            password_error = "Please provide a valid password.";
            document.getElementById("password_error").innerHTML = password_error;
            submit = false;
        }
        return submit;
        // }
    }

    function activationWarning() {
        //var activation_message = "<?php //echo $activation_message; ?>//";
        document.getElementById("message").innerHTML = "TESET ActivATION";
    }

    function removeWarning() {
        document.getElementById(this.id + "_error").innerHTML = "";
    }

    // onkeyup needs to be placed after the form to work
    document.getElementById("email").onkeyup = removeWarning;
    document.getElementById("password").onkeyup = removeWarning;

</script>

<script type="text/javascript">
    function showMessage() {
        document.getElementById("message").style.visibility = "visible";
    }

    //            'document.getElementById("message").innerHTML += "Oops! Activate your account first."; ' .
    setTimeout("showMessage()", 1000);
</script>
