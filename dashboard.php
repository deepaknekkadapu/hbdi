<?php
include_once("./includes/topnav.php");
include_once("./includes/login_loader.php"); ?>

<!-- container -->
<div class="container" style="width: 90%; max-width: 900px"
     xmlns:display="http://www.w3.org/1999/xhtml">

    <!-- Dashboard Header: new project, title, search -->
    <div class="section-wrap">
        <!-- create New Project button -->
        <div style="border: ; display: block;text-align: right; ">
            <button style="padding: 0 5px; border-radius: 8px; border: 2px solid #782f40; background-color: #915664; position: relative; ">
                <a href="project/project_new.php"
                   style="text-decoration-line: none; color: #FFFFFF; border-radius: 25px; height: 20px; ">
                    Create New Project
                </a>
            </button>
        </div>
        <!--   Dashboard Title  -->
        <div class="page-title">
            <!--            <div style="position: relative; display: inline; text-align: center; margin: 20px; padding: 25px">-->
            <span style=""> HBDI Dashboard </span>
        </div>

        <!-- end of dashboard header: New project, title & search-->
    </div>


    <!-- Content Display Section-->
    <div class="section-wrap">

        <!-- Left Column  -->
        <div class="section-column" style="width: 34.25%;">

            <!-- Projects Pane -->
            <div class="section-pane" style="width: 100%">

                <!-- pane header: Projects -->
                <div class="pane-header">
                    <span class="title">   Your Projects </span>
                    <span class="block-tail"> </span>
                    <a href="project/project_new.php" data-toggle="tooltip" title="Add a new project"> <i class="fas fa-plus-circle"
                                                          style="color: grey; font-size: 1em"></i>
                    </a>
                </div>

                <!-- pane content: Projects -->
                <div class="pane-content">
                    <div class="content-header" style="width: 70%"> Project</div>

                    <div class="content-header"> Role</div>
                    <?php
                    $stmt = $pdo->query(" 
SELECT id_project, lead, member, guest 
FROM project_user 
WHERE lead = '$uid_hbdi' OR member = '$uid_hbdi' OR guest = '$uid_hbdi' ");

                    foreach ($stmt as $row) {
                        $id_project = $row['id_project'];
                        if (isset($row['lead'])) {
                            $lead = $row['lead'];
                            $role = "lead";
                        } elseif (isset($row['member'])) {
                            $member = $row['member'];
                            $role = "member";
                        } elseif (isset($row['guest'])) {
                            $guest = $row['guest'];
                            $role = "guest";
                        }

                        $stmt2 = $pdo->query(" 
 SELECT title_project_short 
 FROM projects 
 WHERE id_project = $id_project ");
                        foreach ($stmt2 as $row2) {
                            $title_project_short = $row2['title_project_short'];
                            echo "
                            <div class='content-item-wrap'>
<div class='content-item' style='width: 70%'><a href='$p/projects/$username_hbdi/$title_project_short.php'>$title_project_short</a></div> 
<span class='content-item'>$role</span> 
</div>";
                        }
                    }
                    ?>
                </div>
            </div> <!--end of Project Pane-->


            <!--Tasks Pane -->
            <div class="section-pane">
                <!-- Heaer: Tasks -->
                <div class="pane-header">
                    <label class="title"> <a href="tasks.php">Your Tasks</a> </label>


                    <span style="color: #888888"
                          data-toggle="modal"
                          data-target="#taskModal"><i class="fas fa-plus-circle"></i>
                    </span>


                    <a href="tasks.php">
                        <i class="fas fa-chevron-circle-right"
                           style="color: grey; font-size: 1em"></i>
                    </a>
                </div>


                <!-- The Task Modal -->
                <div class="modal" id="taskModal">

                    <!-- Task Modal dialog-->
                    <div class="modal-dialog" style="height: 750px">
                        <div class="modal-content">

                            <!-- Modal header -->
                            <div class="modal-header">
                                <h4 class="modal-title"> Add a Task </h4>
                                <button type="button" class="close" data-dismiss="modal">
                                    &times;
                                </button>
                            </div>

                            <!-- Task Modal body -->
                            <div class="modal-body">
                                <section style=" margin-top: 5px; width: 280px;">


                                    <!-- beginning of TASK PHP -->
                                    <?php

                                    //                                    $postedToken = $_POST['token'];
                                    // prevent resubmission source: https://stackoverflow.com/questions/4614052/how-to-prevent-multiple-form-submission-on-multiple-clicks-in-php
                                    // generate token
                                    function getToken()
                                    {
                                        $token = sha1(mt_rand());
                                        if (!isset($_SESSION['tokens'])) {
                                            $_SESSION['tokens'] = array($token => 1);
                                        } else {
                                            $_SESSION['tokens'][$token] = 1;
                                        }
                                        return $token;
                                    }

                                    // check token
                                    function isTokenValid($token)
                                    {
                                        if (!empty($_SESSION['tokens'][$token])) {
                                            unset($_SESSION['tokens'][$token]);
                                            return true;
                                        }
                                        return false;
                                    }

                                    // Check if a form has been sent
                                    if (isset($_POST['formTaskSubmit'])) {
                                        $postedToken = filter_input(INPUT_POST, 'token');
                                        if (!empty($postedToken)) {
                                            if (isTokenValid($postedToken)) {
                                                // Process form
                                                $created_by = $_POST['created_by'];
                                                $title_task = $_POST['title_task'];
                                                $assigned_to = $_POST['assigned_to'];
                                                $date_due = $_POST['date_due'];
                                                $taskDescription = $_POST['taskDescription'];
                                                $resource = $_POST['resource'];
                                                $remark = $_POST['remark'];
                                                $id_project = $_POST['id_project'];

                                                $stmt = $pdo->prepare("INSERT INTO task (created_by, title_task, assigned_to, date_due, taskDescription, resource, remark, id_project) 
                                    VALUES ('$uid_hbdi', '$title_task', '$assigned_to', '$date_due', '$taskDescription', '$resource', '$remark', '$id_project') ");
                                                $stmt->execute();
                                                echo "<meta http-equiv=REFRESH CONTENT=1;url=$p/projects/" . $username_hbdi . "/" . $title_project_short . ".php>";
                                            } else {
                                                echo "Do something about the error";
                                            }
                                        }
                                    }
                                    // Get a token for the form we're displaying
                                    $token = getToken();
                                    ?>
                                    <!-- End of TASK PHP -->


                                    <!-- Begin TASK FORM Task Modal -->
                                    <form id="formTaskSubmit" method="POST" action="">
                                        <input type="hidden" name="token"
                                               value="<?php echo $token; ?>"/>
                                        <input type="hidden" name="created_by"
                                               value="<?php echo $uid_hbdi ?>">
                                        <input type="hidden" name="id_project"
                                               value="<?php echo $id_project ?>">
                                        <div>
                                            <input type="text" name="title_task"
                                                   placeholder="Title of task... "
                                                   class="signup_row"
                                                   required>
                                        </div>
                                        <div>
                                            <input name="assigned_to"
                                                   placeholder="Assign task to... "
                                                   class="signup_row"
                                                   required>
                                        </div>
                                        <div>
                                            <input name="date_due"
                                                   placeholder="Task due date... "
                                                   class="signup_row"
                                                   required>
                                        </div>
                                        <div>
                                            <input name="taskDescription"
                                                   id="taskDescription"
                                                   placeholder="Task description"
                                                   class="signup_row" required>
                                        </div>
                                        <div>
                                            <input name="resource" placeholder="Resources"
                                                   class="signup_row" required>
                                        </div>
                                        <div>
                                            <input name="remark" placeholder="Remark"
                                                   class="signup_row" required>
                                        </div>
                                        <span style=" display: inline-block; margin-top: 12px">
                                    <input type="submit" name="formTaskSubmit"
                                           id="formTaskSubmit"
                                           style="padding: 0 10px; height: 40px; border-radius: 4px; border: solid 1px grey"
                                           value="Submit">
                                </span>
                                    </form>


                                    <!--                                 Modal footer-->
<!--                                    <span class="modal-footer">-->
                                    <!--                                    <button type="button" class="btn btn-danger"-->
                                    <!--                                            data-dismiss="modal"-->
                                    <!--                                            style="background-color: #7f7f7f; border: 1px solid #BBBBBB">-->
                                    <!--                                        Close-->
                                    <!--                                    </button>-->
                                    <!--                                </span>-->


                                </section>
                            </div>
                            <!-- end of Task modal Body-->


                        </div>
                        <!-- end of modal content-->
                    </div>
                    <!-- end of modal dialog -->
                </div>
                <!-- end of task Modal -->


                <!-- list tasks -->
                <div class="pane-content">
                    <?php
                    echo "
                        <div class='content-header' style='width: 53%;'>  Title  </div> 
                        <div class='content-header' style='width: 19%;'>  Owner  </div> 
                        <span class='content-header' style='width: 24%;'>  Due in  </span>
                        "
                    ?>

                    <div>
                        <?php
                        $stmt = $pdo->query(" 
 SELECT title_task, assigned_to, date_due  
 FROM task 
 WHERE assigned_to = '$uid_hbdi' OR created_by = '$uid_hbdi' ");
                        while ($row = $stmt->fetch()) {

                            $assigned = $row['assigned_to'];
//                            $date = new DateTime(strtotime($row['date_due']));
                            $date_timestamp = $row['date_due'];
//                            $date_timestamp = $date->getTimestamp();
                            $days_due = floor(($date_timestamp - time()) / 86400);
                            if ($days_due <= 3) {
                                $days_due = "<span style='color: #b9133a'> $days_due days </span>";
                            } elseif ($days_due <= 10 && $days_due > 3) {
                                $days_due = "<span style='color: coral'> $days_due days </span>";
                            } else {
                                $days_due = "<span style='color: forestgreen'> $days_due days </span>";
                            }

                            $stmt2 = $pdo->query(" 
 SELECT name_first 
 FROM user WHERE id_user = '$assigned' ");
                            foreach ($stmt2 as $row2) {
                                $name = $row2['name_first'];
                                $title_task = $row['title_task'];
                                echo "
                                <div class='content-item-wrap'>
                                    <div class='content-item' style='width: 53%; '>  $title_task  </div> 
                                    <div class='content-item' style='width: 19%; border: '>  $name  </div> 
                                    <div class='content-item' style='width: 25%; '>  $days_due  </div> 
                                   </div>
                                    ";
                            }
                        }
                        ?>
                    </div>
                </div>
                <!-- end of content pane -->
            </div>
            <!--End of Tsak Pane-->
        </div>
        <!-- End of Left  Column  -->


        <!-- Right Column  -->
        <div class="section-column" style="width: 65.05%">

            <!--Files Pane-->
            <div class="section-pane" style="width: 100%">
                <div class="pane-header">
                            <span class="title">
                                <a style='text-decoration: none'
                                   href="datasets_files.php"> Datasets & Files
                                </a>
                                 <span>

                            <i class="fas fa-folder-plus fa-lg" data-toggle="modal"
                               data-target="#fileModal" style="color: #888888"> </i>
                                 </span>
                                <span><a href="datasets_files.php"><i
                                                class="fas fa-chevron-circle-right"
                                                style="color: grey; size: 1em"></i></a></span>
                            </span>
                </div>


                <!-- The File Modal: uploader -->
                <div class="modal" id="fileModal">
                    <div class="modal-dialog" style="height: 750px">
                        <div class="modal-content" style="height: 200px">

                            <!-- Modal header -->
                            <div class="modal-header" style="height: 50px">
                                <!--                    <h4 class="modal-title">Add Files </h4>-->
                                <h4 class="">Drag and Drop or Select Files </h4>
                                <button type="button" class="close" data-dismiss="modal">
                                    &times;
                                </button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body" style="height: 100px">
                                Drag-and-drop your files below to upload or click on the
                                Choose
                                file button.
                            </div>


                            <?php
                            //if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            if (isset($_POST['submitFile'])) {
                                $id_project = $_POST['id_project'];
                                echo "project ID: " . $id_project . "<br>";
                                $title_project_short = $_POST['title_project_short'];
                                echo "short title: " . $title_project_short . "<br>";
                                $tps = basename($_SERVER['HTTP_REFERER'], ".html");
                                echo "basename: " . $tps . "<br>";
                                if ($title_project_short != $tps) {
                                    echo "Oops! Error with file name! <br>";
                                    exit();
                                }
                                $tps = $title_project_short;
                                echo "Directory: " . $tps . "<br>";
                                $compliance = implode("; ", $_POST['compliance']);

//    check Files Directory
                                if ($_SERVER['HTTP_HOST'] == 'tychen.us') {
                                    $dir_files = $_SERVER['DOCUMENT_ROOT'] . "/hbdi/projects/" . $username_hbdi . "/" . $tps . "_files";
                                }

//   create Files Directory if non-existent
                                if (!file_exists($dir_files)) {
                                    echo "Directory " . $tps . "_files does not exist." .
                                        "Strange. It should have been reaced with the project." .
                                        "Anyway, creating the files directory... <br > ";
                                    mkdir($dir_files, 0777, true) or die("Error creating directory $dir_files . <br>");
                                    if (file_exists($dir_files)) {
                                        echo "Directory $dir_files created. <br>";
                                    } else {
                                        echo "Directory $dir_files NOT created. <br>";
                                        exit();
                                    }
                                }

//    echo "Uploading file: Checking special characters from file name... <br>";
                                $target_dir = $dir_files;
                                echo "Target Directory: " . $target_dir . "<br>";
                                $file = basename($_FILES["fileToUpload"]["name"]);
                                $file2 = preg_replace("/[^ \w-_.()]/", "_", $file);

                                echo "File:  $file <br>";
                                echo "File2: $file2 <br>";

                                if ($file != $file2) {
                                    echo "Please do not use space or special characters (\"-\", \"_\", \".\", and \"()\" are okay) in a file name. <br>";
                                    echo "Redirecting you to the Project page... <br>";
                                    echo "<meta http-equiv=REFRESH CONTENT=5;url=$p/projects/" . $username_hbdi . "/" . $tps . ".php>";
                                    exit();
                                }

                                $target_file = $target_dir . "/" . basename($_FILES["fileToUpload"]["name"]);
                                // $target_file = $target_dir . " / " . basename($_FILES[$file]);
                                // echo "Target file: " . $target_file . " < br>";
                                $uploadOk = 1;

                                // Check if file already exists
                                if (file_exists($target_file)) {
                                    echo "File " . $file . " already exists." . "<br>";
                                    $uploadOk = 0;
                                } elseif
                                    // Check file size
                                ($_FILES["fileToUpload"]["size"] > 500000000) {
                                    echo "Your file " . $file . " is too large in size . ";
                                    $uploadOk = 0;
                                }

                                // Check if $uploadOk is set to 0 by an error
                                if ($uploadOk == 0) {
                                    echo "Your file was not uploaded." . "<br>" . "Redirecting you to the Project page.";
                                    echo "<meta http-equiv=REFRESH CONTENT=5;url=$p/projects/" . $username_hbdi . "/" . $tps . ".php>"; // works
                                    // if everything is ok, try to upload file and record time of upload
                                } else {
                                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                                        $date_uploaded = time();
                                        echo "Time: " . (date("Y-m-d H:i:s", $date_uploaded)) . " <br>";
                                        echo
                                            "The file " . basename($_FILES["fileToUpload"]["name"]) .
                                            " has been successfully uploaded . <br > " .
                                            "Inserting metadata to database... <br > ";
//            echo "<meta http-equiv=REFRESH CONTENT=5;url=$p/projects/" . $username_hbdi . "/" . $tps . ".php>";
//            exit(); // this is whyw the recrds are not inserted into the DB.
//            now insert the records.

                                        $sql = $pdo->prepare("INSERT INTO files (id_project, uploaded_by, name_file, date_uploaded, compliance)
                        VALUES('$id_project', '$uid_hbdi', '$file', '$date_uploaded', '$compliance') ");
                                        if ($sql->execute()) {
                                            echo "Metadata insertion successful. <br>
                                        Redirecting to the Project page.";
                                            echo "<meta http-equiv=REFRESH CONTENT=5;url=$p/projects/$username_hbdi/$tps.php>";
                                            exit();
                                        };

                                        echo "Error inserting file information into the database. <br > 
                                      File upload is successful, though. <br>
                                      Redirecting to the Project page.";

                                        echo "<meta http-equiv=REFRESH CONTENT=5;url=$p/projects/$username_hbdi/$tps.php>";
                                        exit();


//            echo '<meta http-equiv = REFRESH CONTENT = 3;url =./dashboard.php>';
                                    } else {
                                        echo "There was an error uploading your file." . "<br>" .
                                            "Redirecting to Project page...";
                                        echo "<meta http-equiv=REFRESH CONTENT=5;url=$p/projects/$username_hbdi/$tps.php>";
                                        exit();
                                    }
                                }
                                ?>

                            <?php } ?>


                            <div style="padding-left: 15px">
                                <form action="" method="post"
                                      enctype="multipart/form-data">

                                    <input type="file" value="Choose File"
                                           name="fileToUpload"
                                           id="fileToUpload"
                                           style="margin-bottom: 5px">
                                    <div style="padding-left: 90px">
                                        <div><input type="checkbox" name="compliance[]"
                                                    value="HIPAA"> File contains
                                            HIPAA
                                            data
                                        </div>
                                        <div><input type="checkbox" name="compliance[]"
                                                    value="human_subject"> File
                                            contains
                                            human
                                            subject data
                                        </div>
                                        <div><input type="checkbox" name="compliance[]"
                                                    value="protected"> File contains
                                            protected
                                            data
                                        </div>
                                        <div><input type="checkbox" name="compliance[]"
                                                    value="FDA-part11"> File
                                            contains
                                            FDA -
                                            part
                                            11 data
                                        </div>
                                        <div><input type="checkbox" name="compliance[]"
                                                    value="private"> File contains
                                            private
                                            data
                                        </div>
                                        <div><input type="checkbox" name="compliance[]"
                                                    value="public"> File is open to
                                            the
                                            public
                                        </div>

                                        <input type="submit" value="Upload File"
                                               name="submitFile"
                                               style="width: 90px; height: 24px; margin: 10px 20px">
                                    </div>

                                    <input type="hidden" name="id_project"
                                           value="<?php echo $id_project ?>">
                                    <input type="hidden" name="title_project_short"
                                           value="<?php echo $title_project_short ?>">
                                    <input type="hidden" name="username_hbdi"
                                           value="<?php echo $username_hbdi ?>">
                                    <input type="hidden" name="email_hbdi"
                                           value="<?php echo $email_hbdi ?>">

                                </form>
                            </div>


                            <!-- Modal footer -->
                            <!--                    <div class="modal-footer">-->
                            <!--                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>-->
                            <!--                    </div>-->

                            <!--                            <form action="" class="form-container">-->
                            <!--                                <input type="text" placeholder="Enter name or mail to search..." name="search" required>-->
                            <!--                                <button type="submit" class="btn" style="width: 60px; padding: 1px 5px ">Add</button>-->
                            <!--                            </form>-->
                        </div>
                    </div>
                </div>
                <!-- end of File Modal-->


                <div class='pane-content'>
                    <?php
                    echo "
                        <div class='content-header' style='width: 5%;'> FID </div >  
                        <div class='content-header' style='width: 55%;'> Filename </div> 
                        <div class='content-header' style='width: 20%;'> Compliance </div> 
                        <div class='content-header' style='width: '> Uploaded </div> 
                        ";

                    // get project
                    try {
                        $stmt = $pdo->prepare(" 
 SELECT prj.id_project, prj.title_project, prj.title_project_short FROM projects prj 
 INNER JOIN 
 (SELECT id_project FROM project_user 
 WHERE lead = '$uid_hbdi' OR member = '$uid_hbdi' OR guest = '$uid_hbdi') pu
 ON prj.id_project = pu.id_project 
 /*ORDER BY id_project  */
 ");
                        $stmt->execute();
                        $result3 = $stmt->fetchAll();

                        // for each project
                        foreach ($result3 AS $row3) {
                            $id_project = $row3['id_project'];
                            $title_project = $row3['title_project'];
                            $title_project_short = $row3['title_project_short'];
                            echo "<div class='content-title' style='width: calc(100% - 75px)'><a href='$p/projects/$username_hbdi/$title_project_short.php'>$title_project_short: $title_project </a></div>";

                            // each file
                            try {
                                $stmt = $pdo->prepare(" 
 SELECT id_file, name_file, date_uploaded, id_project, compliance 
 FROM files 
 WHERE id_project = '$id_project' 
 /* ORDER BY id_file DESC */
 ");
                                $stmt->execute();
//                                        echo "TEST";
//                                        $numProject = $stmt->rowCount();
                                $result = $stmt->fetchAll();

                                $i = 0;
                                foreach ($result AS $row) {
                                    $id_file = $row['id_file'];
                                    $filename = $row['name_file'];
                                    $date_uploaded = $row['date_uploaded'];
                                    $date_uploaded = date('Y-m-d H:i:s', $date_uploaded);
                                    $days_ago = facebook_time_ago($date_uploaded);
                                    $id_project = $row['id_project'];
                                    $compliance = $row['compliance'];

                                    echo "
                                    <div class='content-item-wrap'>
                                        <div class='content-item' style='width: 5%;'> $id_file </div>
                                        <div class='content-item' style='width: 55%;'> $filename </div> 
                                        <div class='content-item' style='width: 20%;'> $compliance </div> 
                                        <div class='content-item' style='width: ;'> $days_ago</div>
                                    </div>
                                        ";

                                    $i++;
                                    if ($i == 5) {
                                        echo "<div style='color: #BBBBBB; height: 22px; '> &nbsp; &nbsp; &nbsp;.........</div>";
                                        break;
                                    }
                                }
                            } catch
                            (Exception $exception) {
                                echo $exception;
                            }
                            if ($i < 4) {
                                echo "<br>";
                            }
                        }

                    } catch (Exception $exception) {
                        echo $exception;
                    }

                    echo "</div>";
                    //                End of Pane Content: Files & Datasets
                    ?>
                </div>
                <!--end of Files Pane-->
            </div> <!--end of Content Display Section -->
        </div>
        <!-- End of Right Column -->
    </div>
    <!-- end of Section Wrap -->
</div>
<!-- end of Container -->

<?php include_once("./includes/footer.php"); ?>

<?php
//    https://www.webslesson.info/2016/03/facebook-style-time-ago-function-using-php.html
date_default_timezone_set('America/New_York');
function facebook_time_ago($timestamp)
{
    $time_ago = strtotime($timestamp);
    $current_time = time();
    $time_difference = $current_time - $time_ago;
    $seconds = $time_difference;
    $minutes = round($seconds / 60);           // value 60 is seconds
    $hours = round($seconds / 3600);           //value 3600 is 60 minutes * 60 sec
    $days = round($seconds / 86400);          //86400 = 24 * 60 * 60;
    $weeks = round($seconds / 604800);          // 7*24*60*60;
    $months = round($seconds / 2629440);     //((365+365+365+365+366)/5/12)*24*60*60
    $years = round($seconds / 31553280);     //(365+365+365+365+366)/5 * 24 * 60 * 60
    if ($seconds <= 60) {
        return "Just Now";
    } else if ($minutes <= 60) {
        if ($minutes == 1) {
            return "one minute ago";
        } else {
            return "$minutes minutes ago";
        }
    } else if ($hours <= 24) {
        if ($hours == 1) {
            return "an hour ago";
        } else {
            return "$hours hrs ago";
        }
    } else if ($days <= 7) {
        if ($days == 1) {
            return "yesterday";
        } else {
            return "$days days ago";
        }
    } else if ($weeks <= 4.3) //4.3 == 52/12
    {
        if ($weeks == 1) {
            return "a week ago";
        } else {
            return "$weeks weeks ago";
        }
    } else if ($months <= 12) {
        if ($months == 1) {
            return "a month ago";
        } else {
            return "$months months ago";
        }
    } else {
        if ($years == 1) {
            return "one year ago";
        } else {
            return "$years years ago";
        }
    }
}

?>

