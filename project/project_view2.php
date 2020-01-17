<!-- loader -->
<head>

</head>
<body>

<?php

//error_log("testing error log from project_view.php(8)", 0);
$title_project_short = basename($_SERVER['SCRIPT_FILENAME'], '.php');
$username_hbdi = $_SESSION['username_hbdi'];

///// get project info from DB
$stmt = $pdo->prepare(" SELECT id_project, title_project, title_project_short, project_description FROM projects WHERE title_project_short = '$title_project_short' ");
$stmt->execute();
$result = $stmt->fetch();
$id_project = $result['id_project'];
$title_project = $result['title_project'];
//$title_project_short = $result['title_project_short'];  // just get this from basename
$project_description = $result['project_description'];

$user_dir = $_SERVER['DOCUMENT_ROOT'] . "/hbdi/projects/$username_hbdi";
$prj_dir = $user_dir . '/' . $title_project_short . '_files';
//$test_file = $prj_dir . '/' . 'test.txt';
//unlink($test_file);
?>

<!-- Container -->
<div class="container" style="width: 90%; max-width: 900px; ">
    <div id="msg"></div>
    <!-- project Headers Wrapper: compliances, publish, titles, description, keywords, members -->
    <div class="section-wrap">





    <!--  Project FILES Wrapper -->
    <div class="section-wrap">

        <!-- beginning of File Pane -->
        <div class="section-pane" style="width: 100%">
            <div class="pane-header">
                <span class="title"> Datasets & Files </span>
                <span style="display: inline; position: relative;float: ; padding-top: 0 ; margin: 0 2px">
                        <button style="background-color: transparent; border: none; color: #888888"
                                data-toggle="modal"
                                data-target="#fileModal"><span style="color: #">
                                        <i class="fas fa-folder-plus fa-lg"
                                           style="size: .9em; color: #888888"> </i>
                        </button>
                </span>
                <span style="display: none; color: dimgrey; margin-left: 5px"
                      id="fileMenu"> Download | Load (Compute) | Move | Label (Metadata) | Delete  </span>
            </div>

            <!--        begin showing List of FILES -->
            <div class="pane-content">
                <div class='content-header' style='padding: 0; width: 13px;'
                     type='checkbox' name='fileCheck' id='$id_file' value='$id_file'
                     onclick='loadMenu()'></div>
                <div class='content-header' style='width: 50%'> Filename</div>
                <div class='content-header' style='width: 26%'> Compliance</div>
                <div class='content-header' style='width: 15%'> Uploaded</div>
                <div class='content-header' style='width: 4.5%'> FID</div>


                <?php
                echo "<form id='fileChkBox'>";
                if (!isset($title_project_short)) {
                    error_log("\$title_project_short is empty.", 0);
                } else {
                    $path = $_SERVER['DOCUMENT_ROOT'] . "/hbdi/projects/$username_hbdi/$title_project_short" . "_files/";
                }
                $files = scandir($path);
                foreach ($files as $filename) {
                    if (($filename != ".") AND ($filename != "..")) {
                        try {
                            $stmt = $pdo->prepare("
SELECT id_file, date_uploaded, compliance, id_project 
FROM files 
WHERE name_file = '$filename' AND id_project = '$id_project'");
                            $stmt->execute();
                            $result = $stmt->fetch();
                            $id_file = $result['id_file'];
                            $date_uploaded = $result['date_uploaded'];
                            $compliance = $result['compliance'];
                        } catch (PDOException $e) {
                            echo "Oops!";
                            echo $e->getMessage();
                            exit();
                        }
                        $date_time = (date("m-d-y H:i:s", $date_uploaded));
                        //                    if ($date_uploaded > 1980) {
                        if ($id_file) {


                            echo "
                        <div class='content-item-wrap'>
                            <input class='content-item' style='margin-right: 2px; width: 15px;' type='checkbox' name='fileCheck' id='$id_file' value='$id_file' onclick='loadMenu()'> 
                            <div class='content-item' style='width: 50%;'>  $filename  </div> 
                            <div class='content-item' style='width: 26%;'>  $compliance  </div> 
                            <div class='content-item' style='width: 15%;'>  $date_time  </div> 
                            <div class='content-item' style='width: 5%;'>  $id_file  </div>   
                        </div>
                            </form>";
                        }

                    }
                };

                ?>
            </div>

        </div>
        <!-- end of listing FILES -->
    </div>

    <!-- end of File PANE-->


    <!-- The File Modal: uploader -->
    <div class="modal" id="fileModal">
        <div class="modal-dialog" style="height: 750px">
            <div class="modal-content" style="height: 200px">

                <!-- Modal header -->
                <div class="modal-header" style="height: 50px">
                    <!--                    <h4 class="modal-title">Add Files </h4>-->
                    <h4 class="">Drag and Drop or Select Files </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;
                    </button>
                </div>

                <!-- Modal body -->
                <!--                --><?php //error_log("Before showing modal(:831)", 0); ?>
                <div class="modal-body" style="height: 100px">
                    Drag-and-drop your files below to upload or click on the Choose
                    file button.
                </div>


                <?php

                //                                if ($_SERVER["REQUEST_METHOD"] == "GET") {
                //                                    error_log("WHAT THE GET??????????", 0);
                //                                } else {
                //                                    error_log("Request Method is not GET.", 0);
                //                                }

                //                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                //                    error_log("Request Method is POST", 0);
                //                    error_log("file_test: $file_test", 0);

                if (isset($_POST['submitFile'])) {
                    $ttt = print_r($_FILES);
                    error_log("print_r _FILES: $ttt", 0);
                    $file_test = basename($_FILES["userfile"]["name"]);
                    if (isset($file_test)) {
                        error_log("the file: $file_test", 0);
                        $tt = print_r($file_test);
                        error_log("test print_r file_test: $tt", 0);
                    } else {
                        error_log("error: _FILES basename test", 0);
                    }
                    error_log("form submitted (POSTed).", 0);
                    $id_project_from_form = $_POST['id_project'];
                    $title_project_short = $_POST['title_project_short'];
                    $username_hbdi = $_POST['username_hbdi'];
                    error_log("id_project: $id_project; title_project_short: $title_project_short; username_hbdi: $username_hbdi. Variables passed", 0);

                    if (isset($_FILES['userfile']['size']) > 0) {  // this can catch the problem
//                    if (is_uploaded_file($_FILES['userfile']['tmp_name'])) {
                        if (empty($_FILES['userfile']['name'])) { //name is the file name on the client machine
                            echo "FIle name is empty!";
                            error_log("File name is empty!", 0);
                            exit;
                        }
                        $upload_file_name = $_FILES['userfile']['name'];
                        $id_project = $_POST['id_project'];
//                    check URL against short project title to make sure the project is correct
//                        $tps = $_POST['title_project_short']; // get a different name because it's from the form
                        $tps = $title_project_short; // trying the one from the basename of script
                        $target_dir = $_SERVER['DOCUMENT_ROOT'] . '/hbdi/projects/' . $username_hbdi . '/' . $tps . '_files';
                        //                    $compliance = implode("; ", $_POST['compliance']); // for later...
//    check Files Directory
//   create Files Directory if non-existent
//                        if ($_SERVER['HTTP_HOST'] == 'tychen.us') {
//                        $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/hbdi/projects/" . $username_hbdi . "/" . $tps . "_files";
                        if (file_exists($target_dir)) {
//                        echo "Directory " . $tps . "_files does not exist." .
//                            "Strange. It should have been reaced with the project." .
//                            "Anyway, creating the files directory... <br > ";
                            error_log("Target Directory: $target_dir", 0);
                        } else {
//                            exit();
                            mkdir($target_dir, 0755, true) or die("Error creating directory $target_dir . <br>");
                            error_log("Target Directory $target_dir created.", 0);
                        }
//                        }


                        $passed_file = $_FILES['userfile']['name'];
                        $tmp_file = $_FILES['userfile']['tmp_name'];
                        error_log("The file: $passed_file", 0);

                        $target_file = $target_dir . "/" . $passed_file;
                        error_log("Target file: $target_file", 0);
                        $uploadOk = 1;
//                        $target_file = $target_dir . $file;

                        // Check if file already exists
                        if (file_exists($target_file)) {
                            error_log("Target File $target_file already exists.", 0);
                            $uploadOk = 0;
                        }


                        // Check if $uploadOk is set to 0 by an error
                        elseif ($uploadOk == 0) {
                            echo "Your file was not uploaded." . "<br>" . "Redirecting you to the Project page.";
                            echo "<meta http-equiv=REFRESH CONTENT=1;url=$p/projects/" . $username_hbdi . "/" . $tps . ".php>"; // works
                            // if everything is ok, try to upload file and record time of upload
                        } else {
                            if (move_uploaded_file($tmp_file, $target_file)) {

                                $date_uploaded = time();
                                if ($_FILES["userfile"]["error"] == 0) {
                                    error_log("userfile success.", 0);
                                    echo
                                        "The file has been successfully uploaded . <br > " .
                                        "Inserting metadata to database... <br > ";
                                } else {
                                    error_log("Something went wrong... (code: ['userfile']['error'])", 0);
                                }
                            } else {
                                echo "There was an error uploading your file." . "<br>" .
                                    "Redirecting to Project page...";
                                echo "<meta http-equiv=REFRESH CONTENT=5;url=$p/projects/$username_hbdi/$tps.php>";
                                error_log("File upload failed.", 0);
                                exit();
                            }
                            $sql = $pdo->prepare("INSERT INTO files (id_project, uploaded_by, name_file, date_uploaded, compliance)
                        VALUES('$id_project', '$uid_hbdi', '$passed_file', '$date_uploaded', '$compliance') ");
                            if ($sql->execute()) {
                                echo "Metadata inserted successfully.";
                                error_log("Metadata insertion successful. Redirecting to Project page.", 0);
                                echo "<meta http-equiv=REFRESH CONTENT=1;url=$p/projects/$username_hbdi/$tps.php>";
                                exit();
                            } else {
                                echo "Error inserting file information into the database. <br > 
                                      File upload is successful, though. <br>
                                      Redirecting to the Project page.";
                                echo "<meta http-equiv=REFRESH CONTENT=5;url=$p/projects/$username_hbdi/$tps.php>";
                                exit();
                            }
                        }

                    } else {
                        error_log("_FILES['file']['name'] is empty", 0);
                        $err = $_FILES['userfile']['error'];
                        error_log("_FILES error: $err", 0);
                    }
                }
                //                    else {
                //                        error_log("Form not submitted.", 0);
                //                    }
                //                } else {
                //                    error_log("Request Method is not POST.", 0);
                //                }
                ?>


                <div style="padding-left: 15px">
                    <form action='' method='POST' enctype="multipart/form-data">
                        <input name="userfile" type="file" value="CHOOSE Your file">
                        <div style="padding-left: 90px">
                            <input type="hidden" name="id_project" value="<?php echo $id_project; ?>">
                            <input type="hidden" name="title_project_short" value="<?php echo $title_project_short; ?>">
                            <input type="hidden" name="username_hbdi" value=<?php echo $username_hbdi; ?>>
                            <input type="submit" formmethod="post" value="Upload Now" name="submitFile"
                                   style="width: 90px; height: 24px; margin: 10px 20px">

                    </form>

                </div>

            </div>
        </div>
    </div>
    <!-- end of File Modal-->


</div>
<!-- END of Container: Project Viewer -->

</body>