<!doctype html>
<html>
<head>
    <title></title>

    <!-- jQuery -->
    <script src="jquery-3.1.1.min.js" type='text/javascript'></script>

    <!-- Bootstrap -->
    <link href='bootstrap/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
    <script src='bootstrap/js/bootstrap.min.js' type='text/javascript'></script>

</head>
<body>
What's going on?
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#uploadModal">Upload filesss</button>

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

        <!-- Title - Short -->
        <button style="display: inline-block; float: left; padding: 0 5px; border-radius: 8px; border: 2px solid #5b5b5b; background-color: #777777; color: white">
            <?php echo "<span> $title_project_short   </span>"; ?>
        </button>
        <span style="color: white"><?php echo "(PID:$id_project)"; ?></span>
        <!-- Compliance Icons & Publish Project -->
        <div style=" border: ; text-align: right;">
            <i class="fas fa-notes-medical"></i>
            <a href="#" class="expand_collapse" aria-hidden="true" tabindex="1"><i
                        class="fas fa-lock"></i></a>
            <i class="fas fa-unlock-alt "></i>
            <span style="vertical-align: middle "><i
                        class="fab fa-creative-commons-pd "></i></span>
            <button style="padding: 0 5px; border-radius: 8px; border: 2px solid #782f40; background-color: #915664; ">
                <a style="color: #FFFFFF; border-radius: 25px; height: 20px; "
                   data-toggle="modal"
                   data-target="#publishModal">
                    Publish Project</a>
            </button>
            <!--            --><?php //echo '<a class="load-modal" href="project_view.php" data-toggle="modal" data-target="#publishModal"
            //               title="Click To View"> TEST </a> '; ?>
        </div>


        <!--  Project FILES Wrapper -->
        <div class="section-wrap">

            <!-- beginning of File Pane -->
            <!-- Model opens here -->
            <div class="section-pane" style="width: 100%">
                <div class="pane-header">
                    <span class="title"> Datasets & Files </span>
                    <span style="display: inline; position: relative;float: ; padding-top: 0 ; margin: 0 2px">

                        <button style="background-color: transparent; border: none; color: #888888"
                                data-toggle="modal"
                                data-target="#XXXuploadModal">
                            <i class="fas fa-folder-plus fa-lg"
                               style="size: .9em; color: #888888"> </i>
                                                    </button>

                        <!--                        <button style="background-color: transparent; border: none; color: #888888"-->
                        <!--                                data-toggle="modal"-->
                        <!--                                data-target="#fileModal"><span style="color: #">-->
                        <!--                                        <i class="fas fa-folder-plus fa-lg"-->
                        <!--                                           style="size: .9em; color: #888888"> </i>-->
                        <!--                        </button>-->
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
WHERE name_file = '$filename' AND id_project = $id_project");
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
        <!-- end of file pane -->


        <!-- The File Modal content: uploader -->

        <div id="uploadModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content 1-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">File upload form</h4>
                    </div>
                    <div class="modal-body">
                        <!-- Form -->
                        <form method='post' action='' enctype="multipart/form-data">
                            Choose file: <input type='file' name='file' id='file' class='form-control'><br>
                            <input type='button' class='btn btn-info' value='Upload' id='btn_upload'>
                        </form>

                        <!-- Preview-->
                        <div id='preview'></div>
                    </div>

                </div>

            </div>
        </div>

        <!-- Script -->
        <script type='text/javascript'>
            $(document).ready(function () {
                $('#btn_upload').click(function () {

                    var fd = new FormData();
                    var files = $('#file')[0].files[0];
                    fd.append('file', files);

                    // AJAX request
                    $.ajax({
                        url: 'ajaxfile.php',
                        type: 'post',
                        data: fd,
                        contentType: false,
                        processData: false,
                        success: function (response) {
                            if (response != 0) {
                                // Show image preview
                                // $('#preview').append("<img src='"+response+"' width='100' height='100' style='display: inline-block;'>");
                            } else {
                                alert('file not uploaded');
                            }
                        }
                    });
                });
            });
        </script>

        <!-- Modal Content 2 -->
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
                        $file_test = basename($_FILES["filett"]["name"]);
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

                        if (isset($_FILES['filett']['name'])) {  // this can catch the problem
//                    if (is_uploaded_file($_FILES['filett']['tmp_name'])) {
                            if (empty($_FILES['filett']['name'])) { //name is the file name on the client machine
                                echo "FIle name is empty!";
                                error_log("File name is empty!", 0);
                                exit;
                            }
                            $upload_file_name = $_FILES['filett']['name'];
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


                            $passed_file = $_FILES['filett']['name'];
                            $tmp_file = $_FILES['filett']['tmp_name'];
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
//                        elseif
//                            // Check file size
//                        ($_FILES["filett"]["size"] > 500000000) {
//                            echo "Your file " . $file . " is too large in size . ";
//                            $uploadOk = 0;
//                        }

//                        if (isset($target_file)) {
//                            error_log("Target file ($target_file) exists", 0);
//                        } else {
//                            error_log("Target file does NOT exist", 0);
//                        }

//                    $file2 = preg_replace("/[^ \w-_.()]/", "_", $file);

//                    echo "File:  $file <br>";
//                    echo "File2: $file2 <br>";

//                    if ($file != $file2) {
//                        echo "Please do not use space or special characters (\"-\", \"_\", \".\", and \"()\" are okay) in a file name. <br>";
//                        echo "Redirecting you to the Project page... <br>";
//                        echo "<meta http-equiv=REFRESH CONTENT=5;url=$p/projects/" . $username_hbdi . "/" . $tps . ".php>";
//                        exit();
//                    }


                            // Check if $uploadOk is set to 0 by an error
                            elseif ($uploadOk == 0) {
                                echo "Your file was not uploaded." . "<br>" . "Redirecting you to the Project page.";
                                echo "<meta http-equiv=REFRESH CONTENT=1;url=$p/projects/" . $username_hbdi . "/" . $tps . ".php>"; // works
                                // if everything is ok, try to upload file and record time of upload
                            } else {
                                if (move_uploaded_file($tmp_file, $target_file)) {

                                    $date_uploaded = time();
                                    if ($_FILES["filett"]["error"] == 0) {
                                        error_log("filett success.", 0);
                                        echo
                                            "The file has been successfully uploaded . <br > " .
                                            "Inserting metadata to database... <br > ";
                                    } else {
                                        error_log("Something went wrong... (code: ['filett']['error'])", 0);
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
                            $err = $_FILES['filett']['error'];
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
                        <form action='' method="post" enctype="multipart/form-data">
                            <input type="file" value="Choose File" name="filett">
                            <!--                        <div style="padding-left: 90px">-->
                            <!--                            <div><input type="checkbox" name="compliance[]"-->
                            <!--                                        value="HIPAA"> File contains HIPAA data-->
                            <!--                            </div>-->
                            <!--                            <div><input type="checkbox" name="compliance[]"-->
                            <!--                                        value="human_subject"> File contains human subject data-->
                            <!--                            </div>-->
                            <!--                            <div><input type="checkbox" name="compliance[]"-->
                            <!--                                        value="protected"> File contains protected data-->
                            <!--                            </div>-->
                            <!--                            <div><input type="checkbox" name="compliance[]"-->
                            <!--                                        value="FDA-part11"> File contains FDA - part 11 data-->
                            <!--                            </div>-->
                            <!--                            <div><input type="checkbox" name="compliance[]"-->
                            <!--                                        value="private"> File contains private data-->
                            <!--                            </div>-->
                            <!--                            <div><input type="checkbox" name="compliance[]"-->
                            <!--                                        value="public"> File is open to the public-->
                            <!--                            </div>-->
                            <!---->
                            <input type="hidden" name="id_project" value="<?php echo $id_project; ?>">
                            <input type="hidden" name="title_project_short" value="<?php echo $title_project_short; ?>">
                            <input type="hidden" name="username_hbdi" value=<?php echo $username_hbdi; ?>>
                            <!--                            --><?php //error_log("id_project: $id_project; title_project_short: $title_project_short; username_hbdi: $username_hbdi", 0); ?>
                            <!--                        </div>-->
                            <input type="submit" formmethod="post" value="Upload File" name="submitFile"
                                   style="width: 90px; height: 24px; margin: 10px 20px">

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


    </div>
    <!-- END of Container: Project Viewer -->

</body>
</html>