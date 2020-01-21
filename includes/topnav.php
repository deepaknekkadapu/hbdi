<?php
include('headers.php');
if ((!isset($root)) && (isset($_SESSION['document_root']))) {
    $root = $_SESSION['document_root'];
    error_log("$root set,", 0);
}

//ini_set('display_errors', 1});
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

//////// log user out after 15 minutes /////////////
//if (isset($_SESSION['timestamp'])) {
//    if (time() - $_SESSION['timestamp'] > 900) { //subtract new timestamp from the old one
//        echo "<script>alert('You have been inactive for 15 Minutes! Redirecting...');</script>";
//        unset($_SESSION['username_hbdi'], $_SESSION['email_hbdi'], $_SESSION['uid_hbdi'], $_SESSION['timestamp']);
////    $_SESSION['logged_in'] = false;
//        echo "<meta http-equiv=REFRESH CONTENT=5;url=http://tychen.us/hbdi/index.php>";
//        exit;
//    } else {
//        $_SESSION['timestamp'] = time(); //set new timestamp
//    }
//}
/////// end of log user out after 15 mintues ///////

?>


<!-- Begin of Navigation Bar -->
<div class="nav-hbdi" xmlns="http://www.w3.org/1999/html">

    <!--    Logo and Brand -->
    <span>
        <!-- logo -->
        <span style="float: left; padding: 5px 5px 0 5px ">
            <a href="<?php echo $p ?>/index.php"><img style="padding: 0; height: 30px; width: auto; margin-left: 25px"
                                                      alt="HBDI logo"
                                                      src="<?php echo $p ?>/images/favicon_io/apple-touch-icon.png">
            </a>
        </span>

        <!-- brand -->
        <span style="display: inline-block; font-size: 1.8em; font-weight: 600; padding: 4px 0 0 0">
            <a style="display: inline-block; text-decoration: none; color: #FFFFFF;
                padding: 0; margin: 0; border: gold;"
               href="<?php echo $p ?>/index.php">HBDI</a><!--
            --><a style="display: inline-block; text-decoration: none; color: #DDDDDD;
                padding: 0; margin: 0; border: gold"
                  href="https://fsu.edu" target="_blank">@FSU</a>
        </span>
    </span>
    <!-- end of logo and brand -->


    <!-- Navigation Menu to the right -->
    <div class="nav-hbdi-right" style="margin-right: 20px">

        <!-- ##### search Box ##### -->
        <!--        <div class="dropdown-hbdi" style="margin: 5px 50px 0 15px; padding: 5px 0 0 0 ; height: 40px">-->
        <!--            <input-->
        <!--                    style="border-radius: 3px; height: 29px; width: 275px; color: darkgray"-->
        <!--                    type="text" placeholder="Search bar" aria-label="Search">-->
        <!--        </div>-->
        <div class="dropdown-hbdi" style="margin: 2px 0 3px 0 ;padding: 3px 0 0 10px ; height: 40px">
            <input class="search"
                   style="border-radius: 3px; height: 35px; width: 275px; color: darkgray; padding-left: 3px; outline: 0"
                   type="text" placeholder="Search HBDI..." aria-label="Search">
            <i class="fas fa-search" style="padding: 5px 5px 0 3px"> </i>
        </div>


        <?php
        if (!isset($_SESSION['email_hbdi'])) {
            ?>
            <!--            -->
            <!--            <button type='button' class='btn btn-info btn-lg' data-toggle='modal' data-target='#loginModal'> User</button>-->
            <div class="nav-hbdi-item" style="margin: 0 0 0 0">
                <button type='button' class="btn" data-toggle='modal' data-target='#signupModal'
                        style="border:1px solid white; margin: 5px 10px 2px 45px; padding: 2px 38px 0 38px; border-radius: 3px;
                    font-size: .9em; font-weight: bold; background-color: transparent; color: white">SIGN UP
                </button>
            </div>

            <div class="nav-hbdi-item" style="margin: 0 0 0 0">
                <button type="button" class="btn btn-info btn-lg" data-toggle='modal' data-target="#loginModal"
                        style="border:1px solid white; margin: 5px 25px 2px 10px; padding: 2px 38px 0 38px; border-radius: 3px;
                    font-size: .9em; font-weight: bold; background-color: transparent">LOG IN
                </button>

            </div>

            <div class="dropdown-hbdi" style="margin: 0 55px 0 0">
                <a href="">
                    <i class="fas fa-user-circle"></i>
                    <i class="fa fa-caret-down"></i>
                </a>
                <div class="dropdown-hbdi-content" style="z-index: 9999">
                    <a>
                        <button type="button" data-toggle="modal" data-target="#loginModal" style="background-color: transparent;
">Log in
                        </button>
                    </a>
                    <a>Sign up</a>
                    <a>Reset password</a>
                </div>
            </div>


        <?php } else {
        $email_hbdi = $_SESSION['email_hbdi'];
        $username_hbdi = $_SESSION['username_hbdi'];
        $uid_hbdi = $_SESSION['uid_hbdi'];

        ?>


        <div class="dropdown-hbdi">
            <a href="<?php echo $p;
                error_log("\$p: $p", 0);
            ?>/dashboard.php">
                Dashboard
            </a>
        </div>
        <div class="dropdown-hbdi">
                <span class="dropbtn-hbdi">
                <a href="#"> Projects
                <i class="fa fa-caret-down "></i>
                </a>
                </span>
            <div class="dropdown-hbdi-content" style="z-index: 9999">
                <?php
                $stmt = $pdo->prepare("SELECT title_project, title_project_short FROM projects WHERE id_creator = '$uid_hbdi' ");
                $stmt->execute();
                $result = $stmt->fetchAll();
                foreach ($result as $row) {
                    $title_project_short = $row['title_project_short'];
                    $title_project = $row['title_project'];
                    ?>
                    <a href="<?php echo $p ?>/projects/<?php echo $username_hbdi . "/" . $title_project_short ?>.php">
                        <?php echo $title_project_short; ?>
                    </a>
                    <?php
                }
                ?>
            </div>
        </div>


        <a href="<?php echo $p ?>/datasets_files.php">
            <a href="<?php echo $p ?>/datasets_files.php">
                <a href="<?php echo $p ?>/datasets_files.php">
                    Files
                </a>
                <!--        <a href="--><?php //echo $p ?><!--/documents.php"> Documents </a>-->
                <a href="<?php echo $p ?>/tasks.php"> Tasks </a>

                <div class="dropdown-hbdi">
                <span class="dropbtn-hbdi">
                <a href="#"> Resources
                <i class="fa fa-caret-down "></i>
                </a>
                </span>
                    <div class="dropdown-hbdi-content" style="z-index: 9999">
                        <a target='_blank'
                           href="https://www.hpc.iastate.edu/guides/classroom-hpc-cluster/slurm-job-script-generator">Slurm</a>
                    </div>
                </div>
                <div class="dropdown-hbdi">
                    <?php
                    if (isset($email_hbdi) && isset($uid_hbdi)) {
                        $name_first = $pdo->query("SELECT name_first FROM user WHERE email = '$email_hbdi'")->fetch();
                        $name_first = $name_first['name_first'];
                        ?>

                        <!--                <div class="dropdown-hbdi" style="margin: 0 0 0 25px; vertical-align: bottom; border: 1px solid gold">-->


                        <div class="dropdown-hbdi" style="margin: 0 75px 0 0">


                            <a href="">
                                <i class="fas fa-user-circle"></i>
                                <?php echo "$name_first"; ?>
                                <i class="fa fa-caret-down"></i>
                            </a>
                            <div class="dropdown-hbdi-content">
                                <a href="#"> My Profile </a>
                                <a href="<?php echo $p ?>/user/pw_reset.php"> Reset password</a>
                                <a href="<?php echo $p ?>/user/logout.php"> Logout </a>
                            </div>
                        </div>
                    <?php } else { ?>

                        <?php
                    }
                    }
                    ?>
                </div>

    </div>
    <!-- end of vav-hbdi-right -->
</div>
<!-- End of Navigation Bar -->

<!-- Search Modal -->
<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <div style="position: relative; display: inline-block; margin: 0 auto">
                            <span style=" ">
                            <input style="margin: 50px 25px 0 50px; width: 500px; height: 45px; padding-left: 10px; "
                                   type="text" name="search"
                                   placeholder="Search for projects, datasets, and tasks...">
                                                    <span><i style="padding-left: 5px; "
                                                             class="fas fa-search"> </i></a></span>
                            </span>
            <div hidden>
                <button style="margin-top: 55px; font-weight: 500; color: #EEEEEE;
            padding: 7px 13px; border-radius: 10px; background-color: #782f40; width: 150px">
                    <a href="#"
                       style="text-decoration-line: none; color: #FFFFFF; border-radius: 25px; height: 20px; text-align: center; ">
                        SEARCH </a>
                </button>
            </div>
        </div>
    </div>
</div>
<!-- end of Search Modal -->


<!-- ##### Login Processing ##### -->
<?php
error_log("Before login processing...", 0);
if (isset($_POST['submitLogIn'])) {
    error_log("Login processing... ", 0);
    echo "Logging parameters posted...";

    if (isset($_POST['email'])) {
        $email = $_POST['email'];
        error_log('emial posted', 0);
    }
    if (isset($_POST['password'])) {
        $password = $_POST['password'];
//        $password = password_hash($password, PASSWORD_DEFAULT);
        error_log("password posted: $password", 0);

    }


    $stmt = $pdo->prepare("SELECT password, email, username, id_user, activated FROM user WHERE email = '$email' ");
    $stmt->execute();
    $result = $stmt->fetch();

    if ($result) {
        error_log('query ran', 0);
    }

    $password_db = $result['password'];
    error_log("password_db: $password_db", 0);
    $isValid = password_verify($password, $password_db);
    $activated = $result['activated'];

    if (empty($result['email'])) {
        echo "Email address incorrect.";
        error_log("Email address incorrect.", 0);

        echo "<meta http-equiv=REFRESH CONTENT=5;url=$root/hbdi/index.php>";
    } elseif ($isValid) {
        error_log("password is a Match", 0);
        $_SESSION['email_hbdi'] = $result['email'];
        $_SESSION['username_hbdi'] = $result['username'];
        $_SESSION['uid_hbdi'] = $result['id_user'];
        error_log("Sessions saved.");

        unset($_POST['submitLogIn']);
    } else {
        echo " Password incorrect. ";
        error_log('password ERR', 0);
    }
}
?>


<!-- ##### Log In Login Modal ##### -->
<div class="modal " id="loginModal" role="dialog">

    <div class="modal-content" style="width: 500px">

        <div class="modal-header">
            <h4 class="modal-title" style="margin: auto"> Log In </h4>
            <span><button type="button" class="close" data-dismiss="modal">&times
                                </button></span>
        </div>

        <!--                       style="width: 420px; height: 45px; background-color: #c07c89; border: 1px solid #854c58; border-radius: 5px"-->
        <div class="modal-body" style="margin: 0 auto">
            <br><br>
            <form alignstyle="center" name="form" method="post" action="">
                <input type="text" placeholder="email" name="email"
                       class="input_field">
                <input type="password" placeholder="password" name="password"
                       class="input_field">
                <br>
                <br>

                <input class="input_field" type="submit" name="submitLogIn" style="width: 75px"
                       value="Submit">

            </form>
        </div>

        <div>
            New to HBDI? <span style="color: #1b6d85; font-weight: 500"> SIGN UP </span>
        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>

    </div>
</div>
<!-- ##### End of Login Modal ##### -->


<!--  ##### beginning Sign Up Modal ##### -->
<div class="modal" id="signupModal" role="dialog">

    <!-- Modal content-->
    <div class="modal-content" style="width: 500px">
        <div class="modal-header">
            <h4 class="modal-title" style="margin: auto">Sign Up</h4>
            <span><button type="button" class="close" data-dismiss="modal">&times;</button></span>
        </div>

        <!-- sign up Modal Body -->
        <div class="modal-body">
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
                <br>
                <div>
                    <input type="submit" name="submitSignUp" id="submit"
                           class="input_field"
                           style="width: 75px;"
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
        </div>

        <!-- Modal Footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>
<!-- ##### End of Sign Up Modal ##### -->


<!-- ##### Sing Up SignUP Processing ##### -->
<?php
if (isset($_POST['submitSignUp'])) {  //  working.

    error_log("POSTed", 0);
    $name_first = $name_last = $username = $email = $password1 = $password2 = $affiliation = "";

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
//            exit("Redirecting you back to the sign-up page...");
            error_log("There's an error with your input. ", 0);
            exit();
        } else {

            $pass_hash = password_hash($pwd1, PASSWORD_DEFAULT);
//        generate a toekn
            $token = substr("abcdefghijklmnopqrstuvwxyz", mt_rand(0, 25), 1) . substr(md5(time()), 1);

            $result = $pdo->query("SELECT email FROM user WHERE email = '$email' ")->fetch();
            $email_db = $result['email'];
            if (!empty($email_db)) {
                error_log("Email address taken", 0);
                echo "<div class='php-message'>
                        Email taken. Redirecting...
                        </div>;
                <meta http-equiv=REFRESH CONTENT=5;url=$root/hbdi/index.php>";
                exit();
            } else {
                try {
                    $sql = "INSERT INTO user (email, password, username, name_first, name_last, affiliation, account_verify_token ) VALUES (?, ?, ?, ?, ?, ?, ?)";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([$email, $pass_hash, $username, $name_first, $name_last, $affiliation, $token]);

/// send email with token link
                    $link = "<a href='$root/user/signup_verify.php?key=" . $email . "&verify=" . $token . "'> Click to confirm account creation</a>";
/// http://talkerscode.com/webtricks/password-reset-system-using-php.php
                    try {
// the headers: https://stackoverflow.com/questions/28026932/php-warning-mail-sendmail-from-not-set-in-php-ini-or-custom-from-head
                        $headers = 'MIME-Version: 1.0' . "\r\n";
                        $headers .= 'From: admin@hbdi<admin@hbdi.fsu.edu>' . "\r\n";
                        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// the message
                        $msg = "
DO NOT reply to this email. Contact the website administrator for support or questions. <br><br>
Please click on the link to verify your new account: $link. <br>

If the link is not working for you, please copy and paste the URL below
and paste to the address bar of your browser and hit enter to reset your password:<br>
http://tychen.us/hbdi/user/account_verify.php?key=$email&reset=$token
";

// use wordwrap() if lines are longer than 70 characters
                        $msg = wordwrap($msg, 70);
// send email
                        mail("$email", "HBDI: Confirm Account Creation", "$msg", "$headers");
// message user
                        echo "
<div class='php-message'>
<span>
Confirmation email sent. Redirecting... 
</span>
</div>
";


//        Go back to login
                        echo "<meta http-equiv=REFRESH CONTENT=10;url=$root/index.php>";
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
    } catch (Exception $e) {
        echo "error!";
        echo $e->getMessage();
    }
}
?>
<!-- ##### END of SIgn up Processing ##### -->


<?php
//if (isset($_SESSION['email_hbdi'])) {
//    echo "You are already signed in as" . $_SESSION['username'] . ".";
//    die ('<meta http-equiv=REFRESH CONTENT=5;url=../dashboard.php>');
//} else { ?>


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


<script type="text/javascript">
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal
    btn.onclick = function () {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    // window.onscroll = function () {
    //     myFunction()
    // };
    //
    // // Get the navbar
    // var navbar = document.getElementById("navbar");
    //
    // // Get the offset position of the navbar
    // var sticky = navbar.offsetTop;
    //
    // // Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
    // function myFunction() {
    //     if (window.pageYOffset >= sticky) {
    //         navbar.classList.add("sticky")
    //     } else {
    //         navbar.classList.remove("sticky");
    //     }
    // }
</script>
