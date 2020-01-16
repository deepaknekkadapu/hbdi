<?php
include('../includes/topnav.php');

?>


<!-- processing comes first, not form; or it wouldn't work. -->
<?php
//if ($_SERVER["REQUEST_METHOD"] == "POST") {
if (isset($_POST['submit_account_creation'])) {  //  working.

    $name_first = $name_last = $username = $email = $password1 = $password2 = $affiliation = "";
//    echo "test2 <br>";

    function test_input($data) // needs to show before called
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

//    echo $_POST['name_first'];
//    echo $_POST['name_last'];
    $name_first = test_input($_POST['name_first']);
    $name_last = test_input($_POST['name_last']);
    $username = test_input($_POST['username']);
    $email = test_input($_POST['email']);
    $pwd1 = $_POST['password1'];
    $pwd2 = $_POST["password2"];
    $affiliation = test_input($_POST['affiliation']);

//    echo "check3 <br>";
    // https://www.w3schools.com/php/php_form_required.asp
    try {
        if (!preg_match("/^[\w-.]+$/", $name_first)) {
            echo "<div class='php-message'> Only letters are allowed in First Name. </div><br>";
            echo '<meta http-equiv=REFRESH CONTENT=5;url=signup.php>';
        } elseif (!preg_match("/^[\w-.]+$/", $name_last)) {
            echo "<div class='php-message'> Only letters are allowed in Last Name. </div><br>";
            echo '<meta http-equiv=REFRESH CONTENT=5;url=signup.php>';
        } elseif (!preg_match("/^[\w-.]+$/", $username)) {
            echo "<div class='php-message'> Only letters and numbers are allowed in User Name. </div><br>";
            echo '<meta http-equiv=REFRESH CONTENT=5;url=signup.php>';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<div class='php-message'> Email ($email) format incorrect. </div><br>";
            echo '<meta http-equiv=REFRESH CONTENT=5;url=signup.php>';
        } elseif (!preg_match("/^[\w-.]+$/", $affiliation)) {
            echo "<div class='php-message'> Affiliation: Please use only alphanumerical characters ($affiliation). </div><br>";
            echo '<meta http-equiv=REFRESH CONTENT=5;url=signup.php>';
            exit("Redirecting you back to the sign-up page...");
        } else {


            $pass_hash = password_hash($pwd1, PASSWORD_DEFAULT);
            //        generate a toekn
            $token = substr("abcdefghijklmnopqrstuvwxyz", mt_rand(0, 25), 1) . substr(md5(time()), 1);

            $result = $pdo->query("SELECT email FROM user WHERE email = '$email' ")->fetch();
            $email_db = $result['email'];
            if (!empty($email_db)) {
                echo "<div class='php-message'>
This email is already registered. <br> 
Please use another email address. <br>
Redirecting in 5 seconds...
</div>";
                echo '<meta http-equiv=REFRESH CONTENT=5;url=signup.php>';
                exit();
            } else {
                try {
                    $sql = "INSERT INTO user (email, password, username, name_first, name_last, affiliation, account_verify_token ) VALUES (?, ?, ?, ?, ?, ?, ?)";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([$email, $pass_hash, $username, $name_first, $name_last, $affiliation, $token]);

//                    echo "
//<div class='php-message'>
//Your account information is received. <br>
//Sending you a confirmation email... <br>
//</div>
//";

                    /// send email with token link
                    $link = "<a href='tychen.us/hbdi/user/signup_verify.php?key=" . $email . "&verify=" . $token . "'> Click to confirm account creation</a>";
/// http://talkerscode.com/webtricks/password-reset-system-using-php.php
                    try {
// the headers: https://stackoverflow.com/questions/28026932/php-warning-mail-sendmail-from-not-set-in-php-ini-or-custom-from-head
                        $headers = 'MIME-Version: 1.0' . "\r\n";
                        $headers .= 'From: admin@hbdi<tychen@bashnet.us>' . "\r\n";
                        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// the message
                        $msg = "
                DO NOT reply to this email. Contact the website administrator for support or questions. <br><br>
                Please click on the link to verify your new account: $link. <br>
                
                If the link is not working for you, please copy and paste the URL below
                and paste to the address bar of your browser and hit enter to reset your password:<br>
                   http://tychen.us/hbdi/user/account_verify_process.php?key=$email&reset=$token
                    ";

// use wordwrap() if lines are longer than 70 characters
                        $msg = wordwrap($msg, 70);
// send email
                        mail("$email", "HBDI: Confirm Account Creation", "$msg", "$headers");
// message user
                        echo "
<div class='php-message'>
<span>
Confirmation email sent to $email. <br> 
Check email to confirm account. <br>
Redirecting in 10 seconds. 
</span> 
</div> 
";


//        Go back to login
                        echo '<meta http-equiv=REFRESH CONTENT=10;url=login.php>';
                    } catch (Exception $exception) {
                        echo $exception;
                    }

                    echo '<meta http-equiv=REFRESH CONTENT=10;url=login.php>';
                    exit();

                } catch (PDOException $e) {
                    echo "
<div class='php-message'> 
Account not created. <br> 
Please try signing up again. <br>
The error message is as below: <br></div>" .
                        $e->getMessage();
                    echo '<meta http-equiv=REFRESH CONTENT=15;url=signup.php>';
                }
            }
        }
//        }
    } catch (Exception $e) {
        echo "error!";
        echo $e->getMessage();
    }


}
//else {
//    echo "Email address is not found. Redirecting you to homepage...";
//    echo '<meta http-equiv=REFRESH CONTENT=5;url=../index.php>';
//}
?>




<?php
////unset($email_hbdi);
//} ?>


<!-- Begin SIGN UP... -->

<?php
if (isset($_SESSION['email_hbdi'])) {
    echo "You are already signed in as" . $_SESSION['username'] . ".";
    die ('<meta http-equiv=REFRESH CONTENT=5;url=../dashboard.php>');
} else { ?>

    <div class="container" style="width: 90%; max-width: 900px">

        <!-- beginning of sign UP box -->
        <div class="box-wrap">


            <!--    HBDI Sign Up Header -->
            <header class="box-header-wrap">
                <div class="box-header">
                    <span>HBDI</span>
                </div>
                <div class="box-header2">
                    <span> Sign up for an HBDI account </span>
                </div>
            </header>


            <!-- instituion sign up -->
            <section style="padding-top: 35px; margin: 0 auto; ; width: 280px ">
                <!-- institution ID-->
                <!--            <div style="background-image: linear-gradient(to bottom, #fff 0, #e0e0e0 100%); height: 40px;">-->
                <div class="input_field">
                    <!-- institution icon-->
                    <span>
                    <img style=" display: inline-block; height: auto; padding: 5px 10px 0 10px;"
                         src="../images/fsu_32.png"
                         alt="FSU logo">
                </span>
                    <span class="icon-text"> Sign up with your institution ID </span>
                </div>
            </section>

            <!-- OR -->
            <section style="margin-top: 15px ;">
                <div style="text-align: center;  color: darkgray; border: ; text-decoration: none ">
                    OR
                </div>
            </section>


            <!-- FORM: account creation (email & password) -->
            <section style=" margin-top: 5px; width: 280px; border:  blue">
                <form enctype="multipart/form-data" method="POST"
                      onsubmit="return validate();">

                    <div>
                        <input type="text" name="name_first" id="name_first"
                               placeholder="First Name"
                               class="input_field">
                        <div><span id="name_first_error"></span></div>
                    </div>
                    <div><input type="text" name="name_last" id="name_last"
                                placeholder="Last Name"
                                class="input_field">
                        <div><span id="name_last_error"></span></div>
                    </div>
                    <div>
                        <input type="text" name="username" id="username"
                               placeholder="Username"
                               class="input_field">
                        <div><span id="username_error"></span></div>
                    </div>
                    <div>
                        <input type="text" name="email" id="email"
                               placeholder="Email address"
                               class="input_field">
                        <div><span id="email_error"></span></div>
                    </div>
                    <div>
                        <input type="text" name="password1" id="password1"
                               placeholder="Password"
                               class="input_field">
                        <div><span id="password1_error"></span></div>
                    </div>
                    <div><input type="text" name="password2" id="password2"
                                placeholder="Password again" class="input_field">
                        <div><span id="password2_error"></span></div>
                        <div><span id="password_match_error"></span></div>
                    </div>
                    <div>
                        <div style="display: inline-block; width:265px">
                            <input type="text" name="affiliation" id="affiliation"
                                   placeholder="Affiliation" class="input_field">
                        </div>
                        <span style="vertical-align: bottom; color: dimgrey">+</span>
                        <div><span id="affiliation_error"></span></div>
                    </div>

                    <div>
                        <input type="submit" name="submit_account_creation" id="submit"
                               class="input_field"
                               style="width: 65px;"
                               value="Submit">

                        <a href=<?php echo $p ?>/user/login.php
                           style="text-decoration: none; color: dimgrey">
                           <span style="float:right; margin-top: 10px; border: 1px solid grey;
border-radius: 4px; height: 40px; width: 65px; padding: 8px 10px">
                             Log in
                           </span>
                        </a>
                    </div>
                </form>
            </section>
            <section style=" margin-top: 5px; width: 280px;">
                <!---->
                <!--                <span style="text-align: left; padding-top: 10px; width 320px; margin: auto">-->
                <!--                    A confirmation email with a link is arriving.<br>-->
                <!--                    Click on the link to finish account setup.-->
                <!--                </span>-->
            </section>
        </div>
        <!-- ENd Sign Up box-wrap -->
    </div>
    <!-- END container -->


<?php } ?>


<script type="text/javascript">
    function validate() {
        submit = true;
        var name_first_error = "";
        var name_last_error = "";
        var username_error = "";
        var email_error = "";
        var password1_error = "";
        var password2_error = "";
        var affiliation_error = "";

        var name_first = document.getElementById('name_first');
        var name_last = document.getElementById('name_last');
        var username = document.getElementById('username');
        var email = document.getElementById('email');
        var password1 = document.getElementById('password1');
        var password2 = document.getElementById('password2');
        var affiliation = document.getElementById('affiliation');

        var alphanumerics = /^[\w\-\s.'"()]+$/; //https://stackoverflow.com/questions/13283470/regex-for-allowing-alphanumeric-and-space
        if (name_first.value === "" || !(name_first.value.match(alphanumerics))) {
            name_first_error = "Please provide a valid first name.";
            document.getElementById('name_first_error').innerHTML = name_first_error;
            submit = false;
        } else if (name_last.value === "" || !(name_last.value.match(alphanumerics))) {
            name_last_error = "Please provide a valid last name.";
            document.getElementById('name_last_error').innerHTML = name_last_error;
            submit = false;
            return submit;
        } else if (username.value === "" || !(username.value.match(alphanumerics))) {
            username_error = "Please provide a valid username.";
            document.getElementById('username_error').innerHTML = username_error;
            submit = false;
            return submit;
            // } else if (email.value === "" || email.value.indexOf("@") === -1 || email.value.indexOf(".") === -1) {
        } else if (email.value === "" || !(validateEmail(email.value))) {
            email_error = "Please provide a valid email address.";
            document.getElementById("email_error").innerHTML = email_error;
            submit = false;
            return submit;
        } else if (password1.value === "") {
            password1_error = "Please provide a valid password.";
            document.getElementById("password1_error").innerHTML = password1_error;
            submit = false;
            return submit;
        } else if (password2.value === "") {
            password2_error = "Please provide a valid password.";
            document.getElementById("password2_error").innerHTML = password2_error;
            submit = false;
            return submit;
        } else if (password1.value !== password2.value) {
            password_match_error = "The two passwords do not match.";
            document.getElementById("password_match_error").innerHTML = password_match_error;
            submit = false;
            return submit;
        } else if (affiliation.value === "") {
            affiliation_error = "Please provide a valid affiliation title.";
            document.getElementById("affiliation_error").innerHTML = affiliation_error;
            submit = false;
            return submit;
        }
        return submit;
    }

    function removeWarning() {
        document.getElementById(this.id + "_error").innerHTML = "";
    }

    // onkeyup needs to be placed AFTER the form to work
    document.getElementById("name_first").onkeyup = removeWarning;
    document.getElementById("name_last").onkeyup = removeWarning;
    document.getElementById("username").onkeyup = removeWarning;
    document.getElementById("email").onkeyup = removeWarning;
    document.getElementById("password1").onkeyup = removeWarning;
    document.getElementById("password2").onkeyup = removeWarning;
    document.getElementById("password_match").onkeyup = removeWarning;
    document.getElementById("affiliation").onkeyup = removeWarning;

    function validateEmail(email) {
        // var reg = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
        // Not good. didn't detect $$### only @@ https://stackoverflow.com/questions/46155/how-to-validate-an-email-address-in-javascript
        var reg = /^[-!#$%&'*+/0-9=?A-Z^_a-z{|}~](\.?[-!#$%&'*+/0-9=?A-Z^_a-z{|}~])*@[a-zA-Z](-?[a-zA-Z0-9])*(\.[a-zA-Z](-?[a-zA-Z0-9])*)+$/;
        return reg.test(email);
    }
</script>

