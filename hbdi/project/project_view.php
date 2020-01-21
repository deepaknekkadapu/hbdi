<?php
//include "../includes/headers.php";
//include '../includes/headers.php';
//echo $_SERVER['DOCUMENT_ROOT'] . "<br>";
//$dir1 = (dirname(__FILE__) . PHP_EOL);
//echo "dir1" . "$dir1 <br>";
//$dir2 = basename($_SERVER['DOCUMENT_ROOT']);
//echo "dir2" . $dir2 . "<br>";
//$dir3 = $_SERVER['SCRIPT_FILENAME'];
//echo "dir3" . $dir3;
//unset($title_project_short);
$title_project_short = basename($_SERVER['SCRIPT_FILENAME'], '.php');
//echo $title_project_short . " FROM PATH <br>";
//https://stackoverflow.com/questions/4221333/get-the-current-script-file-name
//$project_title_short = basename(__FILE__, ".php");

//$email_hbdi = $_SESSION['email_hbdi'];
//echo $email_hbdi;
//$username_hbdi = $_SESSION['username_hbdi'];
//$title_project_short = basename($_SERVER['SCRIPT_NAME'], '.php');
//$tps = basename($_SERVER['SCRIPT_NAME'], '.php');
try {
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->prepare(" SELECT id_creator, title_project_short FROM project WHERE id_project = 66 ");
    $stmt->execute();
    $result = $stmt->fetch();
    $id_creator = $result['id_creator'];
//    $title_project_short = $result['title_project_short'];
//    echo $title_project_short;
//    echo $id_creator ."test";
} catch (PDOException $exception) {
    echo $exception;
//    exit("Hmm...");
}
//$id_creator = $_SESSION['id_creator'];
//echo $id_creator;
//echo $email_hbdi;
//echo $username_hbdi;
//echo $title_project_short . " TEST";
//echo $tps;
?>

<div class="container" style="max-width: 900px;">
    <!-- Project Dashboard tab -->
    <?php
    if (isset($username_hbdi)) {
    //        echo $username_hbdi;
    //            echo $email_hbdi;
//    echo $id_creator;
    ?>

    <div class="tab-pane fade in active">
        <br>
        <!--   header & create button-->
        <div style="display: inline-block; width: 100%; text-align: center; margin: auto">
            <?php
            try {
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $pdo->prepare(" SELECT id_project, title_project, project_description FROM project WHERE title_project_short = '$title_project_short' AND id_creator = '$id_creator' ");
                $stmt->execute();
                $result = $stmt->fetch();
                $title_project = $result['title_project'];
                $project_description = $result['project_description'];
                $id_project = $result['id_project'];
//                echo $id_project;

            } catch (Exception $exception) {
                echo $exception;
            }
            ?>
            <!--            Project Titles -->
            <div style="font-size: 2em; ; text-align: center"> <?php echo "<span style='background-color: #999999; padding: 0 5px'> $title_project_short" . "</span>" . ": " . $title_project ?>  </div>


            <!--            Project Description -->
            <div style="text-align: left; padding: 10px">
                <div>
                    <label>Project Description: </label>
                </div>
                <div><?php echo " " . $project_description; ?> </div>
            </div>


            <!--            Keywords-->
            <div style="text-align: left; padding: 10px">
                <span>
                    <label> Keywords: </label>
                </span>
                <span style="">
                    <?php
                    try {
                        $stmt = $pdo->prepare(" SELECT keyword FROM project_keyword WHERE id_project = '$id_project' ");
                        $stmt->execute();
                        $result = $stmt->fetchAll();
                        foreach ($result as $row) {
                            echo $row['keyword'] . ", ";
                        }
                    } catch (Exception $exception) {
                        echo $exception;
                    }
                    ?>
                </span>
            </div>
            <!-- create New Project button -->
            <!--            <button style="float: right; font-weight: 500; color: #EEEEEE;-->
            <!--            padding: 7px 13px; border-radius: 10px; background-color: #782f40;">-->
            <!--                <a href="project_new.php" -->
            <!--                   style="text-decoration-line: none; color: #FFFFFF; border-radius: 25px; height: 20px">-->
            <!--                    Create New Project </a>-->
            <!--            </button>-->

        </div>
        <br>
    </div>

    <!-- search Box-->
    <!--        <div style="text-align: center">-->
    <!---->
    <!--            <input style="width: 500px;  padding: 5px 6px; border-radius: 2px; text-align: left" -->
    <!--                   placeholder="Search within your projects...">-->
    <!---->
    <!--        </div>-->

    <br><br>


    <!--    Project MEMBERS-->
    <div>
        <label style="background-color: #999999; padding: 10px; border-radius: 3px; ">Project Members: </label>
        <span style="display: inline; position: relative;float: ; padding-top: 0 ; margin: 0 2px">
            <button type="button" class="btn btn-primary" data-toggle="modal"
                    data-target="#memberModal"
                    style=" color: #555555; background-color: #EEEEEE; border: 2px solid white; height: 30px">
            <!--        <button type="button" class="btn " data-toggle="modal" data-target="#memberModal">-->
            Add Member
            </button>
        </span>
    </div>

    <div class="tab-pane fade in active" style="min-height: 50px">
        <?php
        try {
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $result = $pdo->query(
                " SELECT username FROM user INNER JOIN project_membership ON project_membership.id_user= user.id_user ");

            foreach ($result as $row) {
                ?>
                <label style="margin-left: 10px; padding: 3px; margin-top: 5px;color: #878787; background-color: #eeeeee; padding-left: 10px; border-radius: 4px">

                    <?php echo $row['username'] . '<br>'; ?>

                </label>
                <?php
            }
        } catch (PDOException $exception) {
            echo $exception;
            exit("Hmm...");
        }
        ?>


        <!--        https://www.w3schools.com/bootstrap4/bootstrap_modal.asp-->

        <!-- The Member Modal -->
        <div class="modal" id="memberModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Add Member </h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        Add member.
                    </div>


                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>

        <br><br>
    </div>


    <br><br>


    <!--    Project TASKS-->
    <div><label style="background-color: #999999; padding: 10px; border-radius: 3px"> Project Tasks </label>
        <span style="display: inline; position: relative;float: ; padding-top: 0 ; margin: 0 2px">

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#taskModal"
                    style=" color: #555555; background-color: #EEEEEE; border: 2px solid white; height: 30px">
            Add Task
            </button>
        </span>
    </div>
    <div class="tab-pane fade in active" style="min-height: 50px;">


    </div>

    <!-- The Task Modal -->
    <div class="modal" id="taskModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add Tasks </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    Add tasks.
                </div>


                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>


    <br><br>


    <!--    Project FIELS -->
    <div>
        <label style="background-color: #999999; padding: 10px; border-radius: 3px"> Project Files </label>
        <span style="display: inline; position: relative;float: ; padding-top: 0 ; margin-left: 2px">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#fileModal"
                    style=" color: #555555; background-color: #EEEEEE; border: 2px solid white; height: 30px">
                Add File
            </button>
    </span>
    </div>
    <div class="tab-pane fade in active">

        <!--        show FILES -->
        <div style="padding-left: 20px">

            <?php
            echo "<span style='width: 50px; '> id_project </span>" . "<span style='width: 45px; padding-left: 10px'>" . "ID" . "</span>" . "<span style='padding-left: 20px'> " . "Filename" . '</span>' . "<span style='float:right; padding-right: 10px'>" . "Time Uploaded" . "</span>" . "<br>";

            $path = $_SERVER['DOCUMENT_ROOT'] . "/hbdi/projects/$username_hbdi/$title_project_short" . "_files/";
            //            echo $path;
            $files = scandir($path);
            //            echo $files;
            //            echo $title_project_short;
            foreach ($files as $filename) {
                if (($filename != ".") AND ($filename != "..")) {
                    try {
                        $stmt = $pdo->prepare("SELECT id_file, date_uploaded FROM files WHERE name_file = '$filename' ");
                        $stmt->execute();
                        $result = $stmt->fetch();
                        $date_uploaded = $result['date_uploaded'];
                        $id_file = $result['id_file'];
                        $date_time = (date("Y-m-d H:i:s", $date_uploaded));
                    } catch (Exception $e) {
                        echo "Oops!";
                        echo $e;
                    }
                    if ($date_uploaded > 1980) {
                        echo "<div style='display: inline-block; width: 50px;'> $id_project </div>" . "<div style='display: inline-block; width: 35px; padding-left: 26px'>" . $id_file . "</div>" . "<div style='display: inline-block; padding-left: 28px'> " . $filename . '</div>' . "</span>" . "<span style='float:right; padding-right: 10px'>" . $date_time . "</span>" . "<br>";
                    } else {
                        echo "<div style='display: inline-block; width: 50px;'> $id_project </div>" . "<span style='display: inline-block; width: 35px; padding-left: 26px'>" . $id_file . "</span>" . "<div style='display: inline-block; padding-left: 28px'> " . $filename . '</div>' . "<span style='float:right; padding-right: 10px'>" . "</span>" . "<br>";
                    }
                }
            }
            ?>

            <!-- Button to Open the Modal -->
        </div>
    </div>
</div> <!-- END of Container -->

<!-- MODAL -->

<!-- Trigger/Open The Modal -->
<!--            <button class="btn btn-primary" data-toggle="modal" data-target="#fileModal">Add Files</button>-->


<!-- The File Modal -->
    <div class="modal" id="fileModal">
        <div class="modal-dialog" style="height: 650px">
            <div class="modal-content" style="height: 200px">

                <!-- Modal header -->
                <div class="modal-header" style="height: 50px">
                    <!--                    <h4 class="modal-title">Add Files </h4>-->
                    <h4 class="">Drag-n-Drop or Select Files </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body" style="height: 100px">
                    Drag-and-drop your files below to upload or click on the Choose file button.

                </div>

                <form action="http://tychen.us/hbdi/upload.php" method="post" enctype="multipart/form-data">

                    <input type="file" value="Choose File" name="fileToUpload" id="fileToUpload">
                    <br>
                    <input type="submit" value="Upload File" name="submit"
                           style="width: 90px; height: 24px; ">


                    <input type="hidden" name="id_project" value="<?php echo $id_project ?>">
                    <input type="hidden" name="title_project_short" value="<?php echo $title_project_short ?>">
                    <input type="hidden" name="username_hbdi" value="<?php echo $username_hbdi ?>">
                    <input type="hidden" name="email_hbdi" value="<?php echo $email_hbdi ?>">

                </form>
                <!--                --><?php //echo $tps ?>
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
<br><br>


<?php
} else {
    echo '<meta http-equiv=REFRESH CONTENT=3;url=http://tychen.us/user/login.php';

}
?>
