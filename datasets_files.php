<?php
include_once('includes/topnav.php');
include_once('includes/login_loader.php'); ?>

<!-- Container -->
<div class="container" style="width: 90%; max-width: 900px">

    <!-- Datasets & Files Header: title  -->
    <!--   Section: Datasets & Files  -->
    <div class="section-wrap">
        <div class="section-pane">
            <!-- Datasets button: Filler now -->
            <div style="border: ; display: block;text-align: right; ">
                <button style="padding: 0 5px; border-radius: 8px; border: ; background-color: #FFFFFF; position: relative; ">
                    <a href=""
                       style="text-decoration-line: none; color: #FFFFFF; border-radius: 25px; height: 20px; ">
                        &nbsp;
                    </a>
                </button>
            </div>

            <div class="page-title">
                <span style=""> Datasets & Files </span>
            </div>

        </div>
        <!-- end of dashboard header: New project, title & search-->
    </div>


    <div class="section-wrap">
        <div class="section-pane">
            <div class="pane-header">
                <div class="title">Datasets & Files by Project</div>
                <!-- add files + -->
                <span style="display: inline; position: relative;float: ; padding-top: 0 ; margin: 0 2px">
<!--                        <button style="background-color: transparent; border: none"-->
<!--                                data-toggle="modal"-->
<!--                                data-target="#fileModal"><span style="color: #888888">-->
<!--                                        <i class="fas fa-folder-plus fa-lg"> </i>-->
<!--                        </button> ??????????????-->
                </span>


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


                <span style="display: none; margin-left: 5px; color: dimgrey"
                      id="fileMenu"> Download | Load (Compute) | Move | Label (Metadata) | Delete  </span>

                <!--                <span id="fileMenu" style="display: none; height: 10px">-->
                <!--                    <button name="submit" class="fileMenuItem" id="btn-Download">Download-->
                <!--                                <span style="color: #DDD"> |</span> </button>-->
                <!--                    <button name="submit" class="fileMenuItem" id="btn-Delete">Delete-->
                <!--                                <span style="color: #ddd"> |</span> </button>-->
                <!--                    <button name="submit" class="fileMenuItem" id="btn-Move">Move-->
                <!--                                <span style="color: #DDD">|</span> </button>-->
                <!--                    <button name="submit" class="fileMenuItem" id="btn-Label">Label (metadata)-->
                <!--                    </button>-->
                <!--                    <div id="result"></div>-->
                <!--                </span>-->
            </div>

            <div class="pane-content">
                <!--                <form style='display: inline' action='file/do_something.php' method='POST' target='_blank'>-->


                <script>
                    $(document).ready(function () {
                        $("#btn-Delete").click(function () {
                            var checked_files = [];
                            $('.get-value').each(function () {
                                if ($(this).is(":checked")) {
                                    checked_files.push($(this).val();
                                }
                            });
                            checked_files = checked_files.toString();
                            $.ajax({
                                url: "./file/file_delete.php",
                                method: "POST",
                                data: {checked_files: checked_files},
                                success: function)(data)
                            {
                                $('#result').html(data);
                            }
                        });
                    });
                    })
                    ;
                </script>
                <div>

                    <div class='content-header'
                         style='margin: 7px 2px 0 0; width: 11px;'
                         type='checkbox' name='fileCheck' id='$id_file'
                         value='$id_file'
                         onclick='loadMenu()'></div>
                    <!--                    <div class="content-header" style='width: 5%;'> PID</div>-->
                    <div class="content-header" style='width: 5%;'> FID</div>
                    <div class="content-header" style='width: 55%'> Filename</div>
                    <div class="content-header" style='width: 20%;'> Compliance</div>
                    <div class="content-header" style=''> Uploaded</div>

                </div>

                <?php
                try {
                    $result3 = $pdo->query("
 SELECT prj.id_project, prj.title_project, prj.title_project_short 
 FROM projects prj 
 INNER JOIN 
 (SELECT id_project FROM project_user WHERE lead = '$uid_hbdi' OR member = '$uid_hbdi' OR guest = '$uid_hbdi') pu
 ON prj.id_project = pu.id_project ORDER BY id_project ");

                    foreach ($result3 AS $row3) {
                        $id_project = $row3['id_project'];
                        $title_project = $row3['title_project'];
                        $title_project_short = $row3['title_project_short'];
                        echo "<div class='content-title'><a href='$p/projects/$username_hbdi/$title_project_short.php'>$title_project_short: $title_project </a></div>";

                        // each file
                        try {
                            $stmt = $pdo->prepare(" SELECT id_file, name_file,  date_uploaded, id_project, compliance FROM files WHERE id_project = '$id_project' ORDER BY id_file ");
                            $stmt->execute();
                            $result = $stmt->fetchAll();

                            foreach ($result AS $row) {
                                $id_file = $row['id_file'];
                                $filename = $row['name_file'];
                                $date_uploaded = $row['date_uploaded'];
                                $date_uploaded = (date("m-d-y H:i:s", $date_uploaded));

                                $id_project = $row['id_project'];
                                $compliance = $row['compliance'];

                                echo
                                "<div class='content-item-wrap'>
                                <input class='content-item' style='margin: 5px 2px 0 0; width: 15px;' type='checkbox' name='fileCheck' id='$id_file' value='$id_file' onclick='loadMenu()'>
                                <div class='content-item' style='width: 5%'> $id_file </div>
                                <div class='content-item' style='width: 55%'> $filename </div> 
                                <div class='content-item' style='width: 20%'> $compliance </div> 
                                <div class='content-item' style='width: 15%'>$date_uploaded </div> 
                                    </div > ";
                            }

                        } catch
                        (Exception $exception) {
                            echo $exception;
                        }
//
                    }
                } catch (Exception $exception) {
                    echo $exception;
                }

                //                echo " </form > ";
                ?>
            </div>
            <!-- end of section Pane --->
        </div>
        <!-- end of section wrap -->

    </div>
    <!-- end of container -->
    <div>
<!--        --><?php //include_once("./includes/footer.php"); ?>
    </div>

    <script>
        function loadMenu() {
            var checks = [];
            var text = document.getElementById("fileMenu");
            var text2 = "";
            var i;

            $("input:checkbox[name = fileCheck]:checked").each(function () {
                checks.push($(this).val());
            })
            if (checks.length > 0) {
                text.style.display = "inline - block";

            } else {
                text.style.display = "none";
            }
        }
    </script>
