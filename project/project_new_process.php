<?php
include("../includes/includes.php");
?>

<?php
$id_creator = $_SESSION['id_user'];
echo $id_creator;
//exit();
$username_hbdi = $_SESSION['username_hbdi'];

$title_project = $_POST['title_project'];
$title_project_short = $_POST['title_project_short'];
$date_created = date("Y-m-d");

//$granted_by = $_POST['granted_by'];
$grant_number = $_POST['grant_number'];
$project_description = $_POST['project_description'];
?>


<div class="container">

    <div class="php-message">

        <?php

        try {
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $data = $pdo->query(
                " SELECT title_project_short, id_creator FROM project WHERE id_creator = '$id_creator' AND title_project_short = '$title_project_short' ")->fetchAll();
        } catch (PDOException $exception) {
            echo $exception;
            exit("Hmm...");
        }

        if ($data) {
            echo "A project with the same short project title exists. Redirecting to New Project page in 10 seconds...";
            echo '<meta http-equiv=REFRESH CONTENT=10;url=project_new.php>';
        } else {

            try {
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "INSERT INTO project (title_project, title_project_short, id_creator, date_created, project_description ) VALUES ( '$title_project', '$title_project_short', '$id_creator', '$date_created', '$project_description' ) ";
                $pdo->exec($sql);

            } catch (PDOException $e) {
                echo "Project not created. Possible database error: " . "<br>" . $e->getMessage();
                echo '<meta http-equiv=REFRESH CONTENT=10;url=project_new.php>';
            }

            // create Project Directory
            //            $dir = $_SERVER['DOCUMENT_ROOT'] . "/projects/'$username'" ;

            try {
                $dir = $_SERVER['DOCUMENT_ROOT'] . "/projects/$username_hbdi";
//                echo $dir . "<br>";
                if (!file_exists($dir)) {
                    // ############## NOOOOOO quotes around $dir!!!!!!!!!!!!!!!!!!!!!
                    mkdir($dir, 0777, true) or die ("Can't make directory $dir");
                }

                // Create Project PHP file
                $filename = $dir . '/' . $title_project_short . '.php';
//                echo $filename . "<br>";
                if (file_exists($filename)) {
                    echo "Project directory $filename already exists. ";
                    echo '<meta http-equiv=REFRESH CONTENT=3;url=../project/project_new.php>';
                } else {
                    $myfile = fopen("$filename", 'w') or die("Unable to write $filename");

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
                echo $e;
            }

            echo "HBDI project " . $title_project . " created. <br> Redirecting you to the project page... ";
            echo '<meta http-equiv=REFRESH CONTENT=3;url=../projects/' . $username_hbdi . '/' . $title_project_short . '.php>';
            exit();
        }
        ?>
        }

    </div>
</div>
