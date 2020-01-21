<?php
include('headers.php');
include('footer.php');

?>

<?php
if (isset($_SESSION['email_hbdi'])) {
    $email_hbdi = $_SESSION['email_hbdi'];
    $username_hbdi = $_SESSION['username_hbdi'];
//    echo $email_hbdi . "<br>"; // GOOD
//    echo $username_hbdi; // GOOD
//    echo $id_creator;
    try {
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $pdo->prepare(" SELECT id_creator, title_project_short FROM project WHERE id_project = 66 ");
        $stmt->execute();
        $result = $stmt->fetch();
        $id_creator = $result['id_creator'];
    } catch (PDOException $exception) {
        echo $exception;
    }
}
?>


<div class="">
    <!--    <nav class="navbar fixed-top navbar-expand-lg" style="width: 90%; max-width: 900px">-->
    <nav class="navbar navbar-expand-lg" style="width: 90% ; max-width: 900px; border: solid 0 red; padding: 0; margin: 0 auto; height: 30px">

        <!--    Logo and Brand -->
        <div style="margin: 0; padding: 0; width: ; border: solid 0px white; position: relative; float: left">

            <!-- logo -->
            <div style="float: left; padding: 0 0 0 0; ">
                <img style="height: 34px; width: auto; " alt="HBDI logo"
                     src="http://tychen.us/hbdi/images/favicon_io/apple-touch-icon.png">
            </div>

            <!-- brand -->
            <span><a style="float: left; padding: 0px 0 0 opx; font-weight: bold;
             font-size: 25px; color: #FFF; text-decoration-line: none; "
                     href="http://tychen.us/hbdi/index.php"> HBDI<span style="color: #dddddd">@FSU</span></a>
            </span>
        </div>


        <!--    Menu -->
        <!--        <div class="nav-right"> -->
        <!--        <div class="collapse navbar-collapse nav-right" id="theNavbar"> -->
        <div class="collapse navbar-collapse "
             style="border: solid 0px yellow; padding: 0; margin: 0">
            <!--        <ul class="navbar-nav collapse navbar-collapse "> -->
            <!--            <div class=" " style="float:right; padding-top: 5px; border: 1px"> -->
            <ul class="navbar-nav" style="float: right; border: solid 0px green; padding: 0; margin: 0">
                <!--                <div class="nav-item dropdown"> -->
                <li class="nav-item dropdown">
                    <a href="http://tychen.us/hbdi/dashboard.php"> Projects

                        <?php if (isset($username_hbdi)) { ?>
                        <span class="caret"></span>
                    </a>
                    <!--                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink"> -->

                    <div class="dropdown-menu">
                        <ul>
                            <li class="dropdown-item">
                                <a href="http://tychen.us/hbdi/dashboard.php">
                                    Dashboard
                                </a>
                            </li>
                        </ul>

                        <?php
                        $stmt = $pdo->prepare("SELECT title_project, title_project_short FROM project WHERE id_creator = '$id_creator' ");
                        $stmt->execute();
                        $result = $stmt->fetchAll();
                        foreach ($result as $row) {
                            //                            echo $row['title_project'];
                            $title_project_short = $row['title_project_short'];
                            $title_project = $row['title_project'];

                            ?>

                            <ul>
                                <li class="dropdown-item">
                                    <a href="http://tychen.us/hbdi/projects/<? echo $username_hbdi . "/" . $title_project_short ?>.php">
                                        <?php echo $title_project_short; ?>
                                    </a>
                                </li>
                            </ul>
                            <?php
                        }
                        ?>
                        <?php
                        if (isset($username_hbdi)) { ?>

                            <ul>
                                <li class="dropdown-item">
                                    <a href="http://tychen.us/hbdi/project/project_new.php">
                                        Create New Project
                                    </a>
                                </li>
                            </ul>
                        <?php } ?>
                    </div>
                    <?php } ?>

                </li>


                <li class=" nav-item"><a href="http://tychen.us/hbdi/tasks.php"> Tasks</li>
                <li class=" nav-item"><a href="http://tychen.us/hbdi/files.php"> Files</li>
                <li class=" nav-item "><a href="http://tychen.us/hbdi/documents.php"> Documents</li>
                <li class=" nav-item"><a href="http://tychen.us/hbdi/teams.php"> Teams</li>

                <?php
                if (isset($email_hbdi)) { ?>

                    <li class="nav-item dropdown">
                        <a class="" href="#"> <?php echo $username_hbdi; ?>
                            <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu">
                            <ul>
                                <li class="dropdown-item">
                                    <a href="http://tychen.us/hbdi/edit_account.php"> edit
                                        account </a>
                                </li>
                                <li class="dropdown-item">
                                    <a href="http://tychen.us/hbdi/user/logout.php"> logout </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                <?php } else { ?>
                    <li class="nav-item dropdown">
                        <a href="http://tychen.us/hbdi/user/signup.php"> Sign Up</a> |
                        <a href="http://tychen.us/hbdi/user/login.php"> Log In</a>
                    </li>

                    <?php
                }
                ?>
                <li class="nav-item"><a id="myBtn" href="#"> |
                        <i style="padding-left: 5px; " class="fas fa-search"> </i></a>
                    <div id="myModal" class="modal">

                        <!-- Modal content -->
                        <div class="modal-content">
                            <span class="close">&times;</span>

                            <span style="float: left; ">
                            <input style="margin: 50px 25px 0 50px; width: 500px; height: 45px; padding-left: 10px; "
                                   type="text" name="search" placeholder="Search projects, datasets, and files...">
                                                    <span><i style="padding-left: 5px; " class="fas fa-search"> </i></a></span>
                            </span>
                            <span>
                                <button style="margin-top: 55px; font-weight: 500; color: #EEEEEE;
            padding: 7px 13px; border-radius: 10px; background-color: #782f40; width: 150px">
                                    <a href="#"
                                       style="text-decoration-line: none; color: #FFFFFF; border-radius: 25px; height: 20px; position: ">
                                        SEARCH </a>
                                </button>
                            </span>
                        </div>
                    </div>
                </li>

            </ul>
        </div>
    </nav>
</div>


<script>
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
</script>