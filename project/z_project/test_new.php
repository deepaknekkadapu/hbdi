<?php
include("../includes/topnav.php");
include("../includes/login_loader.php");
?>

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
</head>


<!-- PHP -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
//if (isset($_POST['Submit'])) {   // doesn't work.

    $title_project = $_POST['title_project'];
    $title_project_short = $_POST['title_project_short'];
    $username_hbdi = $_POST['username'];

    $time_created = time();
    $date_begin = $_POST['date_begin'];
    $date_begin = strtotime($date_begin);
    $date_to_complete = $_POST['date_to_complete'];
    $date_to_complete = strtotime($date_to_complete);

    $granted_by = $_POST['granted_by'];
    $grant_number = $_POST['grant_number'];
    $project_description = $_POST['project_description'];
//    echo $project_description . "<br>";
//    echo $uid_hbdi . "<br>";

//  check if Short Title (the project filename) exists
    $check_title = $pdo->query(" SELECT title_project_short FROM projects WHERE 
                    id_creator = '$uid_hbdi' AND title_project_short = '$title_project_short' ");

    $msg = "Checking if the short project title exists. <br>";

    if ($check_title->rowCount() > 0) {
        $msg = "Oops! This short project title ($title_project_short) already exists. <br>
            Please choose a different short title. <br>
            Redirecting to the New Project page in <span id='counter'>5</span> seconds...";
        echo '<meta http-equiv=REFRESH content=5;url=project_new.php>';
    } else {
        // Create User directory, Project_files directory, and Project.php view file, & test.txt

        // 1/4 create User Directory for projects
        $msg = "Creating your user directory for your projects...";
        $user_dir = $_SERVER['DOCUMENT_ROOT'] . "/hbdi/projects/$username_hbdi";
        if (file_exists($user_dir)) {
            $msg = " User directory exists. Good. <br>";
        } else {
            // ############## NOOOOOO quotes around $dir!!!!!!!!!!!!!!!!!!!!!
            mkdir($user_dir, 0755, true) or die ("Cannot creat directory $user_dir. Please contact the system administrator if the problem persist.");
            if (file_exists($user_dir)) {
                $msg = "User directory successfully created.";
            } else {
                $msg = "Oops! Something went wrong when creating your user directory. <br>
                Contact the system administrator. <br>
                Redirecting to the Dashboard.";
                echo '<meta http-equiv=REFRESH content=5;url=../dashboard.php>';
            }
        }

        // 2/4 & 3/4 create PROject_files directory AND test.txt + coPY jSON file
        $prj_dir = $user_dir . '/' . $title_project_short . '_files';
        if (!file_exists($prj_dir)) {
            mkdir($prj_dir, 0755, true) or die ("Project directory not created."); // 4 digits required
            if (file_exists($prj_dir)) {
                $msg = "Project_files directory $prj_dir created! Good.";
                error_log("Project_files directory $prj_dir created! Good.", 0);
//                3/4
                $test_file = $prj_dir . '/' . 'test.txt';
//                touch($test_file);
                $test_f = fopen($test_file, 'w') or die("Test.txt not created.");
                if ($test_f) {
                    $msg = "Test file created.<br>";
                    chmod($test_file, 0644); // need 4 digits to work
                }
//                unlink($test_file);
                $projects_dir = $_SERVER['DOCUMENT_ROOT'] . "hbdi/projects";
                $test_json = "$projects_dir/test.json";
                $dir_json = "$prj_dir/test.json";
                copy("$test_json", "$dir_json");
            } else {
                $msg = "Something went wrong when creating your project file directory. <br>
Redirecting you to the Dashboard.";
                echo '<meta http-equiv=REFRESH content=5;url=../dashboard.php>';
            }
        }

//    4/4 Project PHP viewer file to display project. "<br>";
        $filename = $user_dir . '/' . $title_project_short . '.php';
//        touch($filename);
        $msg = "Creating project directory and files...";
        $myfile = fopen("$filename", 'w') or die("Unable to write $filename");
        chmod($filename, 0755);


        //  INSERT project info to DB.project
        $msg = "Creating project records...";
        try {
            $sql = " INSERT INTO projects (id_creator, title_project, title_project_short, project_description, time_created, date_begin, date_to_complete ) 
                    VALUES ($uid_hbdi, '$title_project', '$title_project_short', '$project_description', '$time_created', $date_begin, $date_to_complete) ";
            $pdo->exec($sql);
        } catch (PDOException $e) {
            echo $sql . $e->getMessage();
            echo '<meta http-equiv=REFRESH content=5;url=../dashboard.php>';
        }
        $msg = "Project records successfully inserted into the database.";


        //TD: insert compliance info to DB.permission
//TD: kill test.txt
//            TD: query id_project from projects
        try {
            $id_project = $pdo->query(" SELECT id_project FROM projects WHERE title_project_short = '$title_project_short' ")->fetch();
            $id_project = $id_project['id_project'];
        } catch (PDOException $exception) {
            echo "Project ID error: " . $exception->getMessage();
        }

        try {
            $stmt = " INSERT INTO project_user (lead, id_project) VALUES ('$uid_hbdi', $id_project) ";
            $pdo->exec($stmt);
        } catch (PDOException $e) {
            echo $e->getMessage() . "OOPS! SQL failed.<br>";
        }
        //            check
        if (!$myfile) {
            echo "Variable $myfile is not set. Something went wrong. Contact SysAdmin.";
            exit();
        } else {
            $msg = "Project display file created. Good";
        }

        // throw headers into the PHP file
        $txt = <<<EOF
<?php 
include('../../includes/includes.php');
include('../../project/project_view.php');
?>
EOF;

        fwrite($myfile, $txt);
        fclose($myfile);
    }

// Project Creation a Success; redirecting.
    $msg = "HBDI project $title_project is successfully created. <br> 
Redirecting you to the Project page... " . "</div> ";
    echo "<div class='php-message'>$msg</div>";
    echo '<meta http-equiv=REFRESH content=5;url=../projects/' . $username_hbdi . '/' . $title_project_short . '.php>';
    exit();


}
?>

<!-- End of php-message -->

<!-- HTML/PHP Form -->
<div class="container" style="width: 90%; max-width: 900px">

    <?php
    if (!isset($_SESSION['email_hbdi'])) {

        echo '<div class="php-message">';
        echo "Please log in first.";
        echo '<meta http-equiv=REFRESH content=30;url=' . $p . '/user/login.php>';
        echo '</div>';

    } else {
    ?>

    <!-- If logged in, run the form-->
    <!-- The Form -->
    <div class="box-wrap">
        <header class="box-header-wrap">
            <div class="box-header">
                HBDI
            </div>
            <div class="box-header2">
                Create New Project
            </div>
        </header>

        <form id="regForm" name="regForm" method="POST" action="">
            <!-- One "tab" for each step in the form: -->

            <!-- Tab 1 -->
            <div class="tab">
                <section class="box-section">
                    <!--                    <label class="control-label"> Titles:</label>-->
                    <input placeholder="Project title... (128 characters maximum)"
                           type="text" name="title_project"
                           class="input_field" required>
                    <input placeholder="Short title... (10 characters maximum)"
                           type="text"
                           name="title_project_short"
                           class="input_field" required>

                </section>

                <section class="box-section">
                    <label>Granted By:</label>
                    <div>
                        <div class="box-checkbox"><input type="checkbox" id="nih"
                                                         name="granted_by[]" value="NIH">
                            NIH
                        </div>
                        <div class="box-checkbox"><input type="checkbox"
                                                         name="granted_by[]" value="HHS">
                            HHS
                        </div>
                        <div class="box-checkbox"><input type="checkbox"
                                                         name="granted_by[]" value="NSF">
                            NSF
                        </div>
                        <div class="box-checkbox"><input type="checkbox"
                                                         name="granted_by[]" value="FSU">
                            FSU
                        </div>

                        <div style="padding: 5px 0 5px 2px">
                            <i class="fas fa-plus"></i>
                            <span style="padding-left: 2px">Other</span>
                            <!--                    <input type="text">-->
                        </div>
                    </div>
                </section>
                <p><input placeholder="Grant number..." name="grant_number"><br></p>


                <!--            datetime picker -->
                <section class="box-section">
                    <div>
                        <label>Dates:</label>
                        <div>
                            <!--                        <label> Project Begins: </label>-->
                            <div class='input-group date' id='datetimepicker1'>
                                <input type='text' class="form-control"
                                       placeholder="Project begins date" name="date_begin">
                                <span class="input-group-addon">
                     <span class="glyphicon glyphicon-calendar"></span>
                     </span>
                                <script>
                                    $(function () {
                                        $('#datetimepicker1').datetimepicker();
                                    });
                                </script>
                            </div>
                        </div>
                        <div class="form-group" style="margin-top: 10px">
                            <!--                        <label>Project Ends (estimate): </label>-->
                            <div class='input-group date' id='datetimepicker2'>
                                <input type='text' class="form-control"
                                       placeholder="Project ends date (estimate)" name="date_to_complete">
                                <span class="input-group-addon">
                     <span class="glyphicon glyphicon-calendar"></span>
                     </span>
                            </div>
                            <script>
                                $(function () {
                                    $('#datetimepicker2').datetimepicker();
                                });
                            </script>
                        </div>
                    </div>
                </section>
            </div>

            <!-- end of tab 1 -->


            <!-- Tab 2 Description -->
            <div class="tab">

                <section class="box-section">
                    <input placeholder="Project Description" type="text"
                           name="project_description"
                           class="input_field" style="height: 100px; padding-top: 5px">
                </section>

                <section class="box-section">
                    <input placeholder="Key Words" type="text" name="key_words"
                           class="input_field">
                </section>

                <section class="box-section">
                    <label> Data compliance </label>
                    <div><input type="checkbox" name="compliance[]" value="HIPPA"> Project
                        contains HIPPA data
                    </div>
                    <div><input type="checkbox" name="compliance[]" value="human_subject">
                        Project contains human
                        subject data
                    </div>
                    <div><input type="checkbox" name="complaince[]" value="protected">
                        Project contains protected data
                    </div>
                    <div><input type="checkbox" name="complaince[]" value="public">
                        Project data open to the public
                    </div>
                </section>
            </div>

            <!-- Tab 3 -->
            <div class="tab">
                <section class="box-section">
                    <label> Members: </label>
                    <input placeholder="Team Member 1..." type="text" name="team_member_1"
                           class="input_field">
                    <input type="text" name="username" class="input_field"
                           value="<?php echo $username_hbdi; ?>" hidden>

                    <div> + more members</div>
                </section>
            </div>


            <section class="box-section">
                <div style="overflow:auto;">
                    <div style="margin: 0 auto; align-items: center; text-align: center">
                        <button type="button" id="prevBtn" onclick="nextPrev(-1)">
                            Previous
                        </button>
                        <span> &nbsp;&nbsp;</span>
                        <button type="button" id="nextBtn" onclick="nextPrev(1)">
                            Next
                        </button>
                    </div>
                </div>
                <!-- Circles which indicates the steps of the form: -->
                <div style="text-align:center">
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                </div>
            </section>
        </form>
    </div>
    <!-- End of box-wrap -->
</div>
<!-- End of Container -->
<?php
}
?>


<!-- JavaScripts-->
<script type="text/javascript">
    $(".form_datetime").datetimepicker({format: 'yyyy-mm-dd hh:ii'});
</script>

<script type="text/javascript">
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab

    function showTab(n) {
        // This function will display the specified tab of the form...
        var x = document.getElementsByClassName("tab");
        x[n].style.display = "block";
        //... and fix the Previous/Next buttons:
        if (n == 0) {
            document.getElementById("prevBtn").style.display = "none";
        } else {
            document.getElementById("prevBtn").style.display = "inline";
        }
        if (n == (x.length - 1)) {
            document.getElementById("nextBtn").innerHTML = "Submit";
        } else {
            document.getElementById("nextBtn").innerHTML = "Next";
        }
        //... and run a function that will display the correct step indicator:
        fixStepIndicator(n)
    }

    function nextPrev(n) {
        // This function will figure out which tab to display
        var x = document.getElementsByClassName("tab");
        // Exit the function if any field in the current tab is invalid:
        if (n === 1 && !validateForm()) return false;
        // Hide the current tab:
        x[currentTab].style.display = "none";
        // Increase or decrease the current tab by 1:
        currentTab = currentTab + n;
        // if you have reached the end of the form...
        if (currentTab >= x.length) {
            // ... the form gets submitted:
            document.getElementById('regForm').submit();
            return false;
        }
        // Otherwise, display the correct tab:
        showTab(currentTab);
    }

    function validateForm() {
        // This function deals with validation of the form fields
        var x, y, i, valid = true;
        x = document.getElementsByClassName("tab");
        y = x[currentTab].getElementsByTagName("input");
        // A loop that checks every input field in the current tab:
        for (i = 0; i < y.length; i++) {
            // If a field is empty...
            if (y[i].value == "") {
                // add an "invalid" class to the field:
                y[i].className += " invalid";
                // and set the current valid status to false
                valid = false;
            }
        }
        // If the valid status is true, mark the step as finished and valid:
        if (valid) {
            document.getElementsByClassName("step")[currentTab].className += " finish";
        }
        return valid; // return the valid status
    }

    function fixStepIndicator(n) {
        // This function removes the "active" class of all steps...
        var i, x = document.getElementsByClassName("step");
        for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
        }
        //... and adds the "active" class on the current step:
        x[n].className += " active";
    }
</script>

<script type="text/javascript">
    function countdown() {
        var i = document.getElementById('counter');
        if (parseInt(i.innerHTML) <= 0) {
            location.href = 'login.php';
        }
        if (parseInt(i.innerHTML) != 0) {
            i.innerHTML = parseInt(i.innerHTML) - 1;
        }
    }

    setInterval(function () {
        countdown();
    }, 500);
</script>