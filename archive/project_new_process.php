<?php include("../includes/topnav.php"); ?>


<?php
if (isset($_POST['submit'])) {
$id_user = $_SESSION['id_user'];
//echo $id_creator;
//exit();
//$username_hbdi = $_SESSION['username_hbdi'];  // has in log in

$title_project = $_POST['title_project'];
$title_project_short = $_POST['title_project_short'];
$date_created = date("Y-m-d");

$granted_by = $_POST['granted_by'];
$grant_number = $_POST['grant_number'];
$project_description = $_POST['project_description'];


?>


<div class="php-message">

    <?php

    //  check if Short Title exists
    try {
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $data = $pdo->query(
            " SELECT title_project_short, id_creator FROM project WHERE id_creator = '$id_user' AND title_project_short = '$title_project_short' ")->fetchAll();
    } catch (PDOException $exception) {
        echo $exception;
        exit("Hmm...");
    }

    if ($data) {
        echo "A project with the same short project title exists. <br> 
            Redirecting to New Project page in 10 seconds...";
        echo '<meta http-equiv=REFRESH CONTENT=10;url=project_new.php>';
    } else {

        //  INSERT project info to DB.project
        try {
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO project (title_project, title_project_short, id_creator, date_created, project_description ) VALUES ( '$title_project', '$title_project_short', '$id_user', '$date_created', '$project_description', '$compliance'  ) ";
            $pdo->exec($sql);
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
        // insert compliance info to DB.permission

        // create Project Directory
        try {
//                if ($_SERVER['DOCUMENT_ROOT'] == "tychen.us") {
            $dir = $_SERVER['DOCUMENT_ROOT'] . "/hbdi/projects/$username_hbdi" . "_files";
            if (!file_exists($dir)) {
                // ############## NOOOOOO quotes around $dir!!!!!!!!!!!!!!!!!!!!!
                mkdir($dir, 0777, true) or die ("Cannot creat directory $dir. Please contact the system administrator if the problem persist.");
            }

            // Create Project PHP file
            $filename = $dir . '/' . $title_project_short . '.php';
//                echo $filename . "<br>";
            if (file_exists($filename)) {
                echo "Project $filename already exists. ";
                echo '<meta http-equiv=REFRESH CONTENT=3;url=../project/project_new.php>';
            } else {
                $myfile = fopen("$filename", 'w') or die("Unable to write $filename");
                if (!$myfile) {
                    echo "Variable $myfile is not set";
                    exit();
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

        } catch (Exception $e) {
            echo "File/directory creation error. Error message: <br> ";
            echo $e->getMessage();
            exit();
        }

        echo "HBDI project " . $title_project . " created. <br> Redirecting you to the project page... ";
        echo '<meta http-equiv=REFRESH CONTENT=3;url=../projects/' . $username_hbdi . '/' . $title_project_short . '.php>';
        exit();
    }


    }
    ?>

</div>

