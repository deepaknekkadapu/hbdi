<?php
include('includes/includes.php');
$id_user = $_SESSION['id_user'];
//echo $id_user . ": ID of USER <br>"
?>

<?php
if (!isset($_SESSION['email_hbdi'])) {
    echo '<meta http-equiv=REFRESH CONTENT=0;url=./user/login.php>';
} else {

?>


<div class="container" style="width: 90%; max-width: 900px">

    <div tab-pane fade in active>

    </div>
    <br>

    <div style="padding-left: 20px">
        <div>
            <label>List from DB</label>
        </div>
        <?php
        echo
            "<div style='display: inline-block; width: 30px;'> PID </div> " .
            "<div style='display: inline-block; width: 115px;'> Project</div>" .
            "<div style='display: inline-block; width: 43px;'> FID </div > " .
            "<div style='display: inline-block; width: 20px;'> Filename </div>" .
            "<div style='display: inline-block; float:right; padding-right: 10px'> Time Uploaded </div> <br> ";

        try {
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $pdo->prepare(" SELECT id_file, name_file,  date_uploaded, id_project FROM files ORDER BY id_project ");
            $stmt->execute();
            $result = $stmt->fetchAll();
            foreach ($result AS $row) {
                $id_file = $row['id_file'];
                $filename = $row['name_file'];
                $date_uploaded = $row['date_uploaded'];
                $id_project = $row['id_project'];

                try {
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $stmt2 = $pdo->prepare(" SELECT title_project_short FROM project WHERE id_project = '$id_project' ");
                    $stmt2->execute();
                    $result2 = $stmt2->fetchAll();
                    foreach ($result2 as $row2) {
                        $result2 = $stmt2->fetchAll();
                        $title_project_short = $row2['title_project_short'];

                        echo
                            "<div style='display: inline-block; width: 30px;'> $id_project </div>" .
                            "<div style='display: inline-block; width: 120px;'> $title_project_short </div>" .
                            "<div style='display: inline-block; width: 45px;'> $id_file </div>" .
                            "<div style='display: inline-block; width: 20px;'> $filename </div> " .
                            "<div style='display: inline-block; float:right; padding-right: 10px'>" . (date('Y-m-d H:i:s', $date_uploaded)) . "</div> <br>";
                    }
                } catch (Exception $exception) {
                    echo $exception;
                }


            }
        } catch (Exception $exception) {
            echo $exception;
        }

        }
        ?>
    </div>
</div>

<!--        //        $path = $_SERVER['DOCUMENT_ROOT'] . " / hbdi / projects / $username_hbdi / $title_project_short" . "_files / ";-->
<!--        //        //            echo $path;-->
<!--        //        $files = scandir($path);-->
<!--        //        //            echo $files;-->
<!--        //        //            echo $title_project_short;-->
<!--        //        foreach ($files as $filename) {-->
<!--        //            if (($filename != " . ") AND ($filename != " ..")) {-->
<!--        //                try {-->
<!--        //                    $stmt = $pdo->prepare("SELECT id_file, date_uploaded FROM files WHERE name_file = '$filename' ");-->
<!--        //                    $stmt->execute();-->
<!--        //                    $result = $stmt->fetch();-->
<!--        //                    $date_uploaded = $result['date_uploaded'];-->
<!--        //                    $id_file = $result['id_file'];-->
<!--        //                    $date_time = (date("Y - m - d H:i:s", $date_uploaded));-->
<!--        //                } catch (Exception $e) {-->
<!--        //                    echo "Oops!";-->
<!--        //                    echo $e;-->
<!--        //                }-->
<!--        //                if ($date_uploaded > 1980) {-->
<!--        //                    echo " < div style = 'display: inline-block; width: 50px;' > $id_project </div > " . "<div style = 'display: inline-block; width: 35px; padding-left: 26px' > " . $id_file . "</div > " . "<div style = 'display: inline-block; padding-left: 28px' > " . $filename . '</div>' . "</span > " . "<span style = 'float:right; padding-right: 10px' > " . $date_time . "</span > " . "<br > ";-->
<!--        //                } else {-->
<!--        //                    echo "<div style = 'display: inline-block; width: 50px;' > $id_project </div > " . "<span style = 'display: inline-block; width: 35px; padding-left: 26px' > " . $id_file . "</span > " . "<div style = 'display: inline-block; padding-left: 28px' > " . $filename . '</div>' . "<span style = 'float:right; padding-right: 10px' > " . "</span > " . "<br > ";-->
<!--        //                }-->
<!--        //            }-->
<!--        //        }-->


<!-- Button to Open the Modal -->
<!--        </div>-->
<!--        <button style="position:absolute; top: 70px; left: 725px; " type="button" class="btn btn - info btn - xs"-->
<!--                data-toggle="modal" data-target="#fileUpload">-->
<!--        </button > -->
<!--        <button style="position:relative; top: 64px; left: 250px;" type="button" class="btn btn-info btn-lg"-->
<!--                data - toggle="modal" data - target="#fileUpload">-->
<!--            <span>-->
<!--                <i class="fas fa-cloud-upload-alt"></i>-->
<!--            </span>-->
<!---->
<!--        </button>-->
<!--Modal -->
<!--        <div id="fileUpload" class="modal fade" role="dialog">-->
<!--            <div class="modal-dialog">-->

<!--Modal content-->
<!--                <div class="modal-content">-->
<!--                    <div class="modal-header">-->
<!--                        <button type="button" class="close" data - dismiss="modal">&times;</button>-->
<!--                        <h4 class="modal-title"> Upload Files </h4>-->
<!--                    </div>-->
<!--                    <div class="modal-body">-->
<!--                        <button style="height: 30px; padding: 0 10px">-->
<!--                            <span style="font-size: 0.75rem"><i class="fas fa-plus"></i></span>-->
<!--                            <span> Click to select files... </span>-->
<!--                        </button>-->
<!--                    </div>-->
<!--                    <div class="modal-footer">-->
<!--                        <button type="button" class="btn btn-default" data - dismiss="modal"> CLOSE</button>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div>-->
<!--            <img src="images/files.png" alt=""-->
<!--                 style="width: 870px; border: ; display: inline; padding-top: 25px">-->
<!--        </div>-->
<!---->
<!--    </div>-->


<!--        <input id = "myBtn" type = "image" src = "images/files.png" alt = "Submit"-->
<!--style="width: 870px; border: solid 1px; display: inline; padding-top: 25px" > -->

<!---->
<!--        <button id = "myBtn" > Upload files-->
<!--        </button > -->
<!---->
<!--        <div id = "myModal" class="modal" > -->
<!---->
<!--Modal content-->
<!--            <div class="modal-content" > -->
<!--                <span class="close" >&times;</span > -->
<!--                <p> Upload files...</p > -->
<!--            </div > -->
<!--        </div > -->
<!---->
<!---->
<!--        <div>-->
<!--            <span>//TD: files; </span>-->
<!--        </div > -->
<!---->
<!--    </div > -->


<!--<script>-->
<!--    // Get the modal-->
<!--    var modal = document.getElementById("myModal");-->
<!---->
<!--    // Get the button that opens the modal-->
<!--    var btn = document.getElementById("myBtn");-->
<!---->
<!--    // Get the <span> element that closes the modal-->
<!--    var span = document.getElementsByClassName("close")[0];-->
<!---->
<!--    // When the user clicks the button, open the modal-->
<!--    btn.onclick = function () {-->
<!--        modal.style.display = "block";-->
<!--    }-->
<!---->
<!--    // When the user clicks on <span> (x), close the modal-->
<!--    span.onclick = function () {-->
<!--        modal.style.display = "none";-->
<!--    }-->
<!---->
<!--    // When the user clicks anywhere outside of the modal, close it-->
<!--    window.onclick = function (event) {-->
<!--        if (event.target == modal) {-->
<!--            modal.style.display = "none";-->
<!--        }-->
<!--    }-->
<!--</script>-->
