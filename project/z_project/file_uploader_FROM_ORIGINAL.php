<?php
//echo $_SERVER['DOCUMENT_ROOT'];
include ("../includes/includes.php");
//                $postedOrNot = (isset($_POST['submitFile']));
//                error_log("Is form poseted? $postedOrNot by $uid_hbdi", 0);


//                if ($_SERVER["REQUEST_METHOD"] == "GET") {
//                    error_log("WHAT THE GET??????????", 0);
//                } else {
//                    error_log("Request Method is not GET.", 0);
//                }

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//                    error_log("Request Method is POST", 0);
    if (isset($_POST['submitFile'])) {
//                        error_log("submitFile has VALUE (POSTed).", 0);
        $id_project = $_POST['id_project'];
//                    check URL against short project title to make sure the project is correct
//                        $tps = $_POST['title_project_short']; // get a different name because it's from the form
        $tps = $title_project_short; // trying the one from the basename of script
        $target_dir = $_SERVER['DOCUMENT_ROOT'] . "hbdi/projects/" . $username_hbdi . "/" . $tps . "_files";
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


//    echo "Uploading file: Checking special characters from file name... <br>";
//                        error_log("One line before the file.", 0);
//                        $file = basename($_FILES["fileToUpload"]["name"]);

        if (isset($_FILES['fileToUpload']['name'])) {
            error_log("Good: _FILES['fileToUpload']['name']", 0);
        } else {
            error_log("Error at: &_FILES['fileToUpload']['name']", 0);
        }
        $passed_file = $_FILES['fileToUpload']['name'];
        $tmp_file = $_FILES['fileToUpload']['tmp_name'];
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
//                        ($_FILES["fileToUpload"]["size"] > 500000000) {
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

//                            if ($_FILES["fileToUpload"][''])
//                            {
                $date_uploaded = time();
                if ($_FILES["fileToUpload"]["error"] == 0) {
                    error_log("fileToUpload success.", 0);
                    echo
                        "The file ($passed_file) has been successfully uploaded . <br > " ;
//                        "Inserting metadata to database... <br > ";
                } else {
                    error_log("Something went wrong... (code: ['fileToUpload']['err'])", 0);
                }
//            echo "<meta http-equiv=REFRESH CONTENT=5;url=$p/projects/" . $username_hbdi . "/" . $tps . ".php>";
//            exit(); // this is whyw the recrds are not inserted into the DB.
//            now insert the records.
            } else {
                echo "There was an error uploading your file." . "<br>" .
                    "Redirecting to Project page...";
                echo "<meta http-equiv=REFRESH CONTENT=5;url=$p/projects/$username_hbdi/$tps.php>";
                error_log("File upload failed.", 0);
                exit();
            }
//            $sql = $pdo->prepare("INSERT INTO files (id_project, uploaded_by, name_file, date_uploaded, compliance)
//VALUES('$id_project', '$uid_hbdi', '$passed_file', '$date_uploaded', '$compliance') ");
//            if ($sql->execute()) {
//                echo "Metadata inserted successfully.";
//                error_log("Metadata insertion successful. Redirecting to Project page.", 0);
//                echo "<meta http-equiv=REFRESH CONTENT=1;url=$p/projects/$username_hbdi/$tps.php>";
//                exit();
//            } else {
//                echo "Error inserting file information into the database. <br >
//File upload is successful, though. <br>
//Redirecting to the Project page.";
//                echo "<meta http-equiv=REFRESH CONTENT=5;url=$p/projects/$username_hbdi/$tps.php>";
//                exit();
//            }

//            echo '<meta http-equiv = REFRESH CONTENT = 3;url =./dashboard.php>';
        }

    } else {
        error_log("submitted Request Method POST has NO value.;", 0);
    }
}
//                else {
//                    error_log("Request Method is not POST.;", 0);
//                }
?>

<div style="padding-left: 15px">
    <form action="" method="post" enctype="multipart/form-data">

        <input type="file" value="Choose File" name="fileToUpload">
        <div style="padding-left: 90px">
            <div><input type="checkbox" name="compliance[]"
                        value="HIPAA"> File contains HIPAA data
            </div>
            <div><input type="checkbox" name="compliance[]"
                        value="human_subject"> File contains human subject data
            </div>
            <div><input type="checkbox" name="compliance[]"
                        value="protected"> File contains protected data
            </div>
            <div><input type="checkbox" name="compliance[]"
                        value="FDA-part11"> File contains FDA - part 11 data
            </div>
            <div><input type="checkbox" name="compliance[]"
                        value="private"> File contains private data
            </div>
            <div><input type="checkbox" name="compliance[]"
                        value="public"> File is open to the public
            </div>

            <input type="hidden" name="id_project" value="<?php echo $id_project; ?>">
            <input type="hidden" name="title_project_short" value="<?php echo $title_project_short; ?>">
            <input type="hidden" name="username_hbdi" value="<?php echo $username_hbdi; ?>">
            <!--                            --><?php //error_log("id_project: $id_project; title_project_short: $title_project_short; username_hbdi: $username_hbdi", 0); ?>
            <input type="submit" formmethod="post" value="Upload File" name="submitFile"
                   style="width: 90px; height: 24px; margin: 10px 20px">
        </div>

    </form>

</div>