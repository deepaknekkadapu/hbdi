<?php include('includes/includes.php'); ?>

<!-- loader -->
<?php include("./includes/login_loader.php"); ?>

<!-- container -->
<div class="container" style="width: 90%; max-width: 900px">

    <!--   Section: Datasets & Files  -->
    <div class="section-wrap">

        <!-- Teams Header: title  -->
        <!-- Datasets button: Filler now -->
        <!-- Filler button -->
        <div style="border: ; display: block;text-align: right; ">
            <button style="padding: 0 5px; border-radius: 8px; border: 2px solid #FFFFFF; background-color: #FFFFFF; position: relative; ">
                <a href="project/project_new.php"
                   style="text-decoration-line: none; color: #FFFFFF; border-radius: 25px; height: 20px; ">
                    &npsp;
                </a>
            </button>
        </div>

        <div class="page-title">
            <span style=""> Teams & Contributors </span>
        </div>

        <!-- search Box-->
        <div style="text-align: center; padding-bottom: 20px">
            <input style="width: 500px;  border-radius: 3px; text-align: left; overflow: hidden; padding: 3px 5px"
                   placeholder="Search for contributors inside/outside your projects...">
        </div>
        <!-- end of dashboard header: New project, title & search-->
    </div>


    <!-- Content Panes display-->
    <div class="section-wrap">

        <!-- Left COLUMN : Projects & Permissions & Teams -->
        <div class="section-column" style="width: 34%">


            <!-- Projects Pane -->
            <div class="section-pane" style="width: 100%">

                <!-- pane header: Projects -->
                <div class="pane-header">
                    <span class="title">   Your Projects </span>
                    <span class="block-tail"> </span>
                    <a href="project/project_new.php"> <i class="fas fa-plus-circle"
                                                          style="color: grey; font-size: 1em"></i>
                    </a>
                </div>

                <!-- pane content: Projects -->
                <div class="pane-content">
                    <div class="content-header" style="width: 70%"> Project</div>

                    <div class="content-header"> Role</div>
                    <?php
                    $stmt = $pdo->query(" 
SELECT id_project, lead, member, guest 
FROM project_user 
WHERE lead = '$uid_hbdi' OR member = '$uid_hbdi' OR guest = '$uid_hbdi' ");

                    foreach ($stmt as $row) {
                        $id_project = $row['id_project'];
                        if (isset($row['lead'])) {
                            $lead = $row['lead'];
                            $role = "lead";
                        } elseif (isset($row['member'])) {
                            $member = $row['member'];
                            $role = "member";
                        } elseif (isset($row['guest'])) {
                            $guest = $row['guest'];
                            $role = "guest";
                        }

                        $stmt2 = $pdo->query(" 
 SELECT title_project_short 
 FROM projects 
 WHERE id_project = $id_project ");
                        foreach ($stmt2 as $row2) {
                            $title_project_short = $row2['title_project_short'];
                            echo "
                            <div class='content-item-wrap'>
<div class='content-item' style='width: 70%'><a href='$p/projects/$username_hbdi/$title_project_short.php'>$title_project_short</a></div> 
<span class='content-item'>$role</span> 
</div>";
                        }
                    }
                    ?>
                </div>
            </div> <!--end of Project Pane-->




            <!--Permissions pane -->
            <div class="section-pane">
                <!-- block header: Permissions (lower-left cell)-->
                <div class="pane-header">
                    <span class="title"> Permissions </span>
                    <span class="block-tail"> </span>
                    <i class="fas fa-plus-circle" style="color: grey; font-size: 1em"></i>
                </div>

                <!-- Grid block content: -->
                <div class="pane-content">
                    <div>Permission 1</div>
                    <div>Permission 2</div>
                </div>
            </div>
            <!--End of permission Pane -->

            <div class="section-pane">
                <div class="pane-header">
                    <span class="title"> Teams </span>
                </div>
                <div class="pane-content">
                    <div> iDigBio</div>
                    <div> Center for Demography & Population Health</div>
                </div>

            </div>

        </div>
        <!--End of left Column -->


        <!-- Right Column: Team members -->
        <div class="section-column" style="width: 65.05%;">
            <div class="section-pane">
                <!-- grid block header: Projects (top-left cell)-->
                <div class="pane-header">
                    <span class="title"> Contributors </span>
                    <span class="block-tail"></span>
                    <i class="fas fa-plus-circle" style="color: grey; font-size: 1em"></i>
                    <span style="display: none; margin-left: 5px; color: dimgrey"
                          id="teamsMenu"> Remove | Message </span>
                </div>

                <!-- Content Pane: Teams -->
                <div class="pane-content">
                    <div class='content-header'
                         style='padding: 0; width: 11px; margin-right:0; '
                         type='checkbox' name='fileCheck' id='$id_file' value='$id_file'
                         onclick='loadTaskMenu()'></div>
                    <div class="content-header" style="width: 5%"> UID</div>
                    <div class="content-header" style="width: 20%"> First Name</div>
                    <div class="content-header" style="width: 20%"> Last Name</div>
                    <div class="content-header" style="width: 20%"> userame</div>
                    <div class="content-header" style="width: 20%"> Role</div>
                    <br>

                    <?php
                    // get Projects (id and title)
                    $prj = $pdo->query(" 
 SELECT pu.id_project, prj.title_project
 FROM project_user pu
 INNER JOIN projects prj
 ON pu.id_project = prj.id_project
 WHERE pu.lead = '$uid_hbdi' OR pu.member = '$uid_hbdi' OR pu.guest = '$uid_hbdi' 
 ");
                    foreach ($prj as $prj_data) {
//                        $id_project = $prj_data['id_project'];
                        $title_project = $prj_data['title_project'];
//                        echo "<div> $id_project </div>";
                        $project_array[] = $prj_data['id_project'];
                    }

                    // get project Title
                    foreach ($project_array as $prj_id) {
                        $title_prj = $pdo->query(" 
 SELECT id_project, title_project, title_project_short 
 FROM projects 
 WHERE id_project = '$prj_id' ");
                        $title = $title_prj->fetch();
                        $id_project = $title['id_project'];
                        $tp = $title['title_project'];
                        $tps = $title['title_project_short'];
                        echo "<div class='content-title'>
<span><a href='$p/$username_hbdi/projects/$tps.php'>$tps: $tp </a></span>

</div>
";
//<span>(PID:$id_project)</span>

                        $prj_users = $pdo->query("
  SELECT lead, member, guest
  FROM project_user
  WHERE id_project = $prj_id;
 ");
                        foreach ($prj_users as $prj_user) {
                            $lead = $prj_user['lead'];
                            $stmt = $pdo->prepare(" 
 SELECT DISTINCT id_user, username, name_first, name_last 
 FROM user 
 WHERE id_user = '$lead' ");
                            $stmt->execute();
                            $result = $stmt->fetchAll();
                            foreach ($result as $row) {
                                $id_user = $row['id_user'];
                                $name_first = $row['name_first'];
                                $name_last = $row['name_last'];
                                $username = $row['username'];
                                echo "
                                <div class='content-item-wrap'>
<input class='content-item' style='margin-right: 2px; width: 15px;' type='checkbox' name='teamCheck' id='$id_user' value='$id_user' onclick='loadTeamsMenu()'> 
                                    <div class='content-item' style='width: 5%'>$id_user</div>
                                    <div class='content-item' style='width: 20%'>$name_first</div> 
                                    <div class='content-item' style='width: 20%'>$name_last </div>
                                    <div class='content-item' style='width: 20%'>$username </div> 
                                    <div class='content-item' style='width: 20%'>Lead </div> 
                                    </div>
                                    ";
                            }
                            $member = $prj_user['member'];
                            $stmt = $pdo->prepare(" 
 SELECT DISTINCT id_user, username, name_first, name_last 
 FROM user 
 WHERE id_user = '$member' ");
                            $stmt->execute();
                            $result = $stmt->fetchAll();
                            foreach ($result as $row) {
                                $id_user = $row['id_user'];
                                $name_first = $row['name_first'];
                                $name_last = $row['name_last'];
                                $username = $row['username'];
                                echo "
                                <div class='content-item-wrap'>
<input class='content-item' style='margin-right: 2px; width: 15px;' type='checkbox' name='teamCheck' id='$id_user' value='$id_user' onclick='loadTeamsMenu()'> 
                                    <div class='content-item' style='width: 5%'>$id_user</div> 
                                    <div class='content-item' style='width: 20%'>$name_first</div> 
                                    <div class='content-item' style='width: 20%'>$name_last </div>
                                    <div class='content-item' style='width: 20%'>$username </div> 
                                    <div class='content-item' style='width: 20%'>Member </div> 
                                    </div>
                                    ";
                            }
                            $guest = $prj_user['guest'];
                            $stmt = $pdo->prepare(" 
 SELECT DISTINCT id_user, username, name_first, name_last 
 FROM user 
 WHERE id_user = '$guest' ");
                            $stmt->execute();
                            $result = $stmt->fetchAll();
                            foreach ($result as $row) {
                                $id_user = $row['id_user'];
                                $name_first = $row['name_first'];
                                $name_last = $row['name_last'];
                                $username = $row['username'];
                                echo "
                                <div class='content-item-wrap'>
<input class='content-item' style='margin-right: 2px; width: 15px;' type='checkbox' name='teamCheck' id='$id_user' value='$id_user' onclick='loadTeamsMenu()'>                                 
                                    <div class='content-item' style='width: 5%'>$id_user</div> 
                                    <div class='content-item' style='width: 20%'>$name_first</div> 
                                    <div class='content-item' style='width: 20%'>$name_last </div>
                                    <div class='content-item' style='width: 20%'>$username </div> 
                                    <div class='content-item' style='width: 20%'>Guest </div> 
                                    </div>
                                    ";
                            }
                        }
                    }
//                    $users = $pdo->query(" SELECT name_first, name_last FROM user WHERE ");

                    ?>
                </div>
            </div>
            <!--end of right pane: Team members-->
        </div>
        <!-- end of Right Column -->
    </div>
    <!-- end of Section Wrap, the whole content  -->


</div>
<!-- End of Container -->



<?php include_once("./includes/footer.php"); ?>



<script type="text/javascript">
    function loadTeamsMenu() {
        var checks = [];
        var text = document.getElementById("teamsMenu");
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