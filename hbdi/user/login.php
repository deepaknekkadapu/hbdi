<?php
include('../includes/includes.php');
?>


    <div class="container">

        <!-- beginning of sign in box -->
        <div style="margin: 0 auto; max-width: 400px; padding-top: 100px; text-decoration: none">

            <div style="border: ; width: 100%; padding: 0 auto; height: auto;">

                <!--    HBDI log in Header -->
                <header style="position: relative;  margin: auto; height: auto; background-color: #dddddd; text-decoration: none">
                    <div style="text-align: center; text-decoration: none">
                        <span style=" font-size: 2em; width: 100%; text-decoration: none">HBDI</span>
                    </div>
                    <div style="top: 75px; padding-bottom: 10px; text-align: center; text-decoration: none">
                        <strong> Log in with your HBDI account to continue </strong>
                    </div>
                </header>


                <!-- instituion sign -->
                <section style="padding-top: 35px; margin: 0 auto; ; width: 280px ">

                    <!-- institution ID-->
                    <div style="background-image: linear-gradient(to bottom, #fff 0, #e0e0e0 100%); height: 40px;">
                        <!-- institution icon-->
                        <span style=" ">
                    <img style=" height: auto; padding: 5px 10px 0px 10px;"
                         src="../images/fsu_32.png"
                         alt="FSU logo">
                </span>
                        <span style="float: right; width: 210px; text-align: ; padding: 10px 5px 0 5px ">Log in with your institution ID
                </span>
                    </div>
                </section>

                <!-- OR -->
                <section style="margin-top: 15px;   ;">
                    <div style="text-align: center;  color: darkgray; border: ; text-decoration: none "> OR</div>
                </section>

                <!-- account log in (email & password) -->
                <section style=" margin-top: 15px; width: 280px;">
                    <div style="">

                        <form id="form_login_hbdi" action="http://tychen.us/hbdi/user/login_process.php" method="POST">
                            <div>
                                <input name="email" placeholder="Email address"
                                       value=""
                                       style=" padding: 0 10px; font-size: 14px; height: 40px; border-radius: 4px; width: 100%; border: solid 1px grey">
                            </div>

                            <div>
                                <!--                        <label for="password" style="display: none; font-size: 14px"><span class="accesskey">P</span>assword:</label>-->
                                <input name="password" placeholder="Password"
                                       style="margin-top: 10px; padding: 0 10px ; font-size: 14px; height: 40px; border-radius: 4px; width: 100%; border: solid 1px grey">
                            </div>

                            <div style=" margin-top: 12px">
                                <!--                        <input type="hidden" name="_eventId" value="submit">-->
                                <input type="submit" name="submit"
                                       style="padding: 0 5px; height: 40px; border-radius: 4px; border: solid 1px grey"
                                       value="LOG IN">

                                <span>
                        <a style="float:right; padding-top: 20px; text-decoration: none"
                           href="">Forget password&#63;</a>
                            </span>
                            </div>

                        </form>
                </section>

                <section style="margin-top: 45px; width: 400px; text-align: center; ">

                    <div>
                        <span><a href="#" style="float:left; text-decoration: none ">Create an HBDI account</a></span>

                        <span><a href="../index.php"
                                 style="float:right; text-decoration: none">Back to HBDI Home</a></span>

                    </div>
                </section>
            </div>
        </div>
        <!-- End of log in box -->

    </div>


<?php
if (!empty($_SESSION['email_hbdi'])) {
    echo "You are already logged in.";
    echo '<meta http-equiv=REFRESH CONTENT=1;url=http://tychen.us/hbdi/dashboard.php>';
} else {
    $email = $password = "";
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = test_input($_POST["email"]);
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    echo "tested";
    return $data;
}

?>