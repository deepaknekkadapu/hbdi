<?php
include_once('includes/topnav.php');
include_once('includes/login_loader.php'); ?>

<!--content container -->
<div class="container" style="width: 90%; max-width: 900px">

    <!-- Tassks Header: SLURM, Title -->
    <div class="section-wrap">

        <!-- SLURM button -->
<!--        <div style="border: ; display: block;text-align: right; ">-->
<!--            <button style="padding: 0 5px; border-radius: 8px; border: 2px solid #782f40; background-color: #915664; position: relative">-->
<!--                <a href=""-->
<!--                   style="text-decoration-line: none; color: #FFFFFF; border-radius: 25px; height: 20px; ">-->
<!--                    Slurm Emulator-->
<!--                </a>-->
<!--            </button>-->
<!--        </div>-->

        <!--   Title: Who's Task Board -->
        <div class="page-title"
        ">
        <!--            <div style="position: relative; display: inline; text-align: center; margin: 20px; padding: 25px">-->
        <span style=""> <?php echo $_SESSION['username_hbdi'] . "'s " ?>Tasks </span>
    </div>
</div>
<!-- end of Task header -->

<!-- Content Display Section-->
<div class="section-wrap">
    <!-- Projects Pane -->
    <div class="section-pane" style="width: 100%">

        <!-- pane header: Projects -->
        <div class="pane-header">
            <span class="title">  Tasks </span>
            <span style="display: inline; position: relative;float: ; padding-top: 0 ; margin: 0 2px">
                    <button style="background-color: transparent; border: none; color: #888888"
                            data-toggle="modal"
                            data-target="#taskModal"><i class="fas fa-plus-circle"></i>
                    </button>
                </span>


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

                                //                                $postedToken = $_POST['token'];
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
                                <!--                                <span class="modal-footer">-->
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


            <span style="display: none; margin-left: 5px; color: dimgrey"
                  id="taskMenu"> Acknowledge | Completed | Message </span>
        </div>

        <!-- pane content: Projects -->
        <div class="pane-content">

            <div class='content-header'
                 style='padding: 0; width: 11px; margin-right:0; '
                 type='checkbox' name='fileCheck' id='$id_file' value='$id_file'
                 onclick='loadTaskMenu()'></div>
            <div class="content-header" style="width: 3%"> ID</div>
            <div class="content-header" style="width: 30%"> Title</div>
            <div class="content-header" style="width: 9%"> From</div>
            <div class="content-header" style="width: 9%"> To</div>
            <div class="content-header" style="width: 9%"> On</div>
            <div class="content-header" style="width: 9%"> Received</div>
            <div class="content-header" style="width: 9%"> Resource</div>
            <div class="content-header" style="width: 9%"> Due</div>
            <div class="content-header" style="width:"> Done</div>

            <div>
                <?php
                $stmt1 = $pdo->query("
 SELECT DISTINCT prj.id_project, prj.title_project, prj.title_project_short FROM projects prj
 INNER JOIN task tk 
 ON tk.id_project = prj.id_project 
 WHERE created_by = '$uid_hbdi' OR assigned_to = '$uid_hbdi'
 ORDER BY prj.id_project DESC 
 ");
                foreach ($stmt1 AS $row1) {
                    $id_project = $row1['id_project'];
                    $title_project_short = $row1['title_project_short'];
                    $title_project = $row1['title_project'];
                    echo "<div class='content-title'><a href='$p/projects/$username_hbdi/$title_project_short.php'>$title_project_short: $title_project</a> </div>";

                    $stmt2 = $pdo->query(" 
 SELECT id_task, title_task, created_by, assigned_to, date_assigned, date_acknowledged, resource, date_due, date_completed 
 FROM task
 WHERE id_project = '$id_project' 
 ");
                    foreach ($stmt2 as $row2) {
                        $id_task = $row2['id_task'];
                        $title_task = $row2['title_task'];
                        $from = $row2['created_by'];
                        $to = $row2['assigned_to'];
                        $on = $row2['date_assigned'];
                        $received = $row2['date_acknowledged'];
                        $resource = $row2['resource'];
                        $due = date('m-d', $row2['date_due']);
//                        $due = $due->format('m-d');
                        $done = $row2['date_completed'];

                        $user1 = $pdo->query(" SELECT name_first FROM user WHERE id_user = $from ");
                        foreach ($user1 as $person1) {
                            $from = $person1['name_first'];
                            $user2 = $pdo->query(" SELECT name_first FROM user WHERE id_user = $to ");
                            foreach ($user2 as $person2) {
                                $to = $person2['name_first'];
                                echo "
                                    <div class='content-item-wrap'>
<input class='content-item' style='margin-right: 2px; width: 15px;' type='checkbox' name='fileCheck' id='' value='' onclick='loadTaskMenu()'> 
                            <div class='content-item' style='width: 3%'> $id_task  </div> 
                            <div class='content-item' style='width: 30%'> $title_task  </div> 
                            <div class='content-item' style='width: 9%'> $from  </div> 
                            <div class='content-item' style='width: 9%'> $to </div> 
                            <div class='content-item' style='width: 9%'> $on  </div> 
                            <div class='content-item' style='width: 9%'> $received </div> 
                            <div class='content-item' style='width: 9%'> $resource </div> 
                            <div class='content-item' style='width: 9%'> $due </div> 
                            <div class='content-item' style='width: 9%'>  $done </div>
                            </div>
                            ";
                            }
                        }
                    }
                }
                ?>
            </div>
        </div>
        <!-- end Pane Content: Tasks-->
    </div>
</div>
</div>
<?php //} ?>


<script type="text/javascript">
    function loadTaskMenu() {
        var checks = [];
        var text = document.getElementById("taskMenu");
        var text2 = "";
        var i;

        $("input:checkbox[name=fileCheck]:checked").each(function () {
            checks.push($(this).val());
        })
        if (checks.length > 0) {
            text.style.display = "inline-block";

        } else {
            text.style.display = "none";
        }
    }
</script>


<?php include_once("./includes/footer.php"); ?>
