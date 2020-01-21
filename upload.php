<?php
//include "$_SERVER[DOCUMENT_ROOT]/includes/headers.php";
include('./includes/includes.php');
//unset($title_project_short);
$tps = basename($_SERVER['HTTP_REFERER'], ".php");
//echo $tps . " line 6 <br>";
$username_hbdi = $_SESSION['username_hbdi'];
$id_user = $_SESSION['id_user'];
//echo $id_user;
//echo $username_hbdi;

try {
    $stmt = $pdo->prepare("SELECT id_project FROM project WHERE title_project_short = '$tps' AND id_creator = '$id_user' ");
    $stmt->execute();
    $result = $stmt->fetch();
    $id_project = $result['id_project'];
//    echo $id_project . " project ID <br>";
} catch (Exception $e) {
    echo "Oops!";
    echo $e;
}

//$id_project = $_SESSION['id_project'];
//echo $id_project;
//exit();
//exit();
//$title_project_short = $_SESSION['title_project_short'];
//echo $title_project_short . "TEST <br>";
//echo $username_hbdi;
//exit();


?>

<div class="container" style="width: 90%; max-width: 900px;">
    <div class="php-message">

        <?php
        if (isset($email_hbdi)) {
        //        echo $email_hbdi . "WHERE have you been??????? <br>";
        //        echo $username_hbdi . "<br>";
        //        echo $title_project_short;
//        $dir = $_SERVER['DOCUMENT_ROOT'] . "/projects/$username_hbdi/$tps" . "_files";
        $dir =  "./projects/$username_hbdi/$tps" . "_files";
        //        echo $dir;
        //                exit;

        if (!file_exists($dir)) {
            mkdir($dir, 0777, true) or die("Error creating directory $dir.");
        }

        $target_dir = $dir;
        $file = basename($_FILES["fileToUpload"]["name"]);
        $file2 = preg_replace("/[^a-zA-Z0-9._-]/", "_", $file);

        if ($file != $file2) {
            echo "Only alphanumerical characters are allow. <br> No special characters in file name. <br> Redirecting... ";
//            header('Location: ' . $_SERVER["HTTP_REFERER"]);
            echo '<meta http-equiv=REFRESH CONTENT=10;url=./projects/' . $username_hbdi . '/' . $tps . '.php>';
            exit();
        }

        $target_file = $target_dir . "/" . basename($_FILES["fileToUpload"]["name"]);
//echo $target_file ;
//exit;
        //        $target_file = $target_dir . "/" . basename($_FILES[$file]);
        $uploadOk = 1;
        //        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        //if(isset($_POST["submit"])) {
        //    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        //    if($check !== false) {
        //        echo "File is an image - " . $check["mime"] . ".";
        //        $uploadOk = 1;
        //    } else {
        //        echo "File is not an image.";
        //        $uploadOk = 0;
        //    }
        //}
        // Check if file already exists

        if (file_exists($target_file)) {
            echo "File " . $file . " already exists." . "<br>";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000000) {
            echo "Your file " . $file . " is too large in size.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        //if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        //    && $imageFileType != "gif" ) {
        //    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        //    $uploadOk = 0;
        //}
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Your file was not uploaded. <br> Redirecting you to the project page.";
//            echo '<meta http-equiv=REFRESH CONTENT=3;url=dashboard.php>';
//                exit();
            echo '<meta http-equiv=REFRESH CONTENT=3;url=./projects/' . $username_hbdi . '/' . $tps . '.php>';
// if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                $date_uploaded = time();
                echo "Time: " . (date("Y-m-d H:i:s", $date_uploaded)) . "<br>";
                echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been successfully uploaded." . "<br> Redirecting you to the project page." . "<br>";
//                echo $timestamp;
//                exit();
                //                $date_uploaded =
                try {
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "INSERT INTO files (id_project, uploaded_by, name_file, date_uploaded ) VALUES ( '$id_project', '$id_user', '$file', '$date_uploaded') ";
                    $pdo->exec($sql);
                } catch (PDOException $e) {
                    echo "Filename not logged. <br> ";
                    echo "The error message is as below:" . "<br>" . $e->getMessage();
                    exit();
                    echo '<meta http-equiv=REFRESH CONTENT=10;url=./projects/' . $username_hbdi . '/' . $tps . '.php>';
                }

                echo '<meta http-equiv=REFRESH CONTENT=3;url=./projects/' . $username_hbdi . '/' . $tps . '.php>';
//                echo '<meta http-equiv=REFRESH CONTENT=3;url=./dashboard.php>';
//                echo "Redirecting...";
//                    if (!empty($_SERVER['HTTP_REFERER'])) {
//                        header("Location: " . $_SERVER['HTTP_REFERER']);
//                    } else {
//                        header("Location: index.php");
//                    }
//                    exit;
            } else {
                echo "There was an error uploading your file.";
//                sleep(3);
//                    if (!empty($_SERVER['HTTP_REFERER'])) {
//                        header("Location: " . $_SERVER['HTTP_REFERER']);
//                    } else {
//                        header("Location: index.php");
//                    }
//                    exit;
//                }
            }
        }

        //            header("Location: index.php");

        ?>

    </div>
</div>
<?php } else {
    echo "<div class='php-message'> Please log in first.  </div>";
} ?>
