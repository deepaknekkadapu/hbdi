<?php
include('../includes/includes.php');
?>

<?php
if (isset($_SESSION['email_hbdi'])) {
    echo "You are already signed in as" . $_SESSION['username'] . ".";
//    echo "Redirecting you to " . $_SESSION['username'] . "'s" . "dashboard";
    die ('<meta http-equiv=REFRESH CONTENT=0;url=../dashboard.php>');
} else { ?>

    <div class="container">

        <!-- beginning of sign UP box -->
        <div style="margin: 0 auto; max-width: 400px; padding-top: 100px; text-decoration: none">


            <!--    HBDI Sign Up Header -->
            <header style="position: relative;  margin: auto; height: auto; background-color: #dddddd; text-decoration: none">
                <div style="text-align: center; text-decoration: none">
                    <span style=" font-size: 2em; width: 100%; text-decoration: none">HBDI</span>
                </div>
                <div style="top: 75px; padding-bottom: 10px; text-align: center; text-decoration: none">
                    <strong> Sign up for an HDBI account </strong>
                </div>
            </header>


            <!-- instituion sign up -->
            <section style="padding-top: 35px; margin: 0 auto; ; width: 280px ">

                <!-- institution ID-->
                <div style="background-image: linear-gradient(to bottom, #fff 0, #e0e0e0 100%); height: 40px;">
                    <!-- institution icon-->
                    <span style=" ">
                    <img style=" height: auto; padding: 5px 10px 0 10px;"
                         src="../images/fsu_32.png"
                         alt="FSU logo">
                </span>
                    <span style="float: right; width: 210px; text-align: ; padding: 10px 5px 0 5px ">Sign up with your institution ID
                </span>
                </div>
            </section>

            <!-- OR -->
            <section style="margin-top: 15px ;">
                <div style="text-align: center;  color: darkgray; border: ; text-decoration: none "> OR</div>
            </section>


            <!-- FORM: account creation (email & password) -->
            <section style=" margin-top: 5px; width: 280px;">
                <div style="">

                    <form id="form_login_hbdi" action="http://tychen.us/hbdi/user/signup_process.php" method="POST">

                        <div>
                            <input name="name_first" placeholder="First Name" class="signup_row" required>
                        </div>

                        <div>
                            <input name="name_last" placeholder="Last Name" class="signup_row" required>
                        </div>

                        <div>
                            <input name="username" placeholder="Username" class="signup_row" required>
                        </div>

                        <div>
                            <input name="email" placeholder="Email address" class="signup_row" required>
                        </div>

                        <div>
                            <input name="password1" placeholder="Password" class="signup_row" required>
                        </div>

                        <div>
                            <input name="password2" placeholder="Password again" class="signup_row" required>
                        </div>

                        <div>
                            <input name="affiliation" placeholder="Affiliation" class="signup_row" required>
                        </div>

                        <div>
                            <input name="id_affiliation" placeholder="Your ID in your affiliation" class="signup_row" required>
                        </div>

                        <div style=" display: inline-block; margin-top: 12px">
                            <input type="submit" name="submit"
                                   style="padding: 0 10px; height: 40px; border-radius: 4px; border: solid 1px grey"
                                   value="Submit">
                        </div>

                        <span style="display: inline; float:right; padding-top: 30px; ">
                            <a href=http://tychen.us/hbdi/user/login.php style="text-decoration: none"> Log in </a>
                        </span>

                    </form>
            </section>

            <?php
            $email = $password1 = $password2 = $username = $first_name =
            $last_name = $affiliation = "";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $email = test_input($_POST['email']);
//                $password1 = test_input($_POST['password1']);
//                $password2 = test_input($_POST['password2']);
                $username = test_input($_POST['username']);
                $first_name = test_input($_POST['first_name']);
                $last_name = test_input($_POST['last_name']);
                $affiliation = test_input($_POST['affiliation']);


                ///// check required fields
                if (empty($_POST["email"])) {
                    $emailErr = "Email is required";
                } else {
                    $email = test_input($_POST["email"]);
                    // check if e-mail address is well-formed
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $emailErr = "Invalid email format";
                    }
                }

//                if (empty($_POST["user_type"])) {
//                    $user_typeErr = "Role is required";
//                } else {
//                    $user_type = test_input($_POST["user_type"]);
//                }

            }

            function test_input($data)
            {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            ?>

            <!--RADIO-->
            <!--            <input type="radio"-->
            <!--                   name="user_type" --><?php //if (isset($user_type) && $user_type == "learner") echo "checked"; ?>
            <!--                   value="learner"> learner-->
            <!--            <input type="radio"-->
            <!--                   name="user_type" --><?php //if (isset($user_type) && $user_type == "staff") echo "checked"; ?>
            <!--                   value="staff"> staff-->
            <!--            <input type="radio"-->
            <!--                   name="user_type" --><?php //if (isset($user_type) && $user_type == "TA") echo "checked"; ?>
            <!--                   value="TA"> TA-->
            <!--            -->
            <!--            <span class="error"> --><?php //echo $user_typeErr; ?><!--</span>-->


        </div> <!-- ENd Sign Up box -->

    </div> <!-- END container -->


<?php } ?>