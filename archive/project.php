<?php
include('../includes/includes.php');
?>

<?php
if (!isset($_SESSION['email_hbdi'])) {
    echo '<meta http-equiv=REFRESH CONTENT=0;url=../user/login.php>';
} else {

//    echo "test";
    ?>

    <!--content container -->
    <div class="container">


        <!-- Content-->
        <div class="tab-content" style="padding-top: 50px ;">

            <!-- Project Dashboard tab -->
            <div id="project-dash" class="tab-pane fade in active">

                <!--   header & create button-->
                <div style="display: inline-block; width: 100%; text-align: center; margin: auto">
                    <span style="font-size: 2em; ; text-align: center"> Projects Dashboard </span>

                    <!-- create New Project button -->
                    <button style="float: right; font-weight: 500; color: #EEEEEE;
            padding: 7px 13px; border-radius: 10px; background-color: #782f40;">
                        <a href="../project/project_new.php"
                           style="text-decoration-line: none; color: #FFFFFF; border-radius: 25px; height: 20px">
                            Create New Project </a>
                    </button>

                </div>
                <br> <br>

                <!-- search Box-->
                <div style="text-align: center">

                    <input type="text" style="width: 500px;  padding: 5px 6px; border-radius: 2px; text-align: left"
                           placeholder="Search within your projects...">

                </div>

                <br><br>


                <!-- Content display-->
                <div class="dashboard-wrapper">
                    <div class="grid-container">

                        <!-- Projects Grid -->
                        <!-- grid #1: Projects -->
                        <div class="grid-block">

                            <!-- header: Projects -->
                            <div class="block-header">
                                <span class="block-title"> Projects</span>
                                <span class="block-nav"> Modified</span>
                            </div>

                            <?php
                            $email = $_SESSION['email_hbdi'];
                            //        echo $email;

                            try {
                                $result = $pdo->query(" SELECT title_project, title_project_short, created_by, date_created FROM project ");

                                foreach ($result as $row) {

                                    $title_project = $row['title_project'];

                                    echo $title_project . "<br>";

                                }
                            } catch (Exception $exception) {
                                echo $exception;
                            }
                            ?>

                            <!-- items: Projects -->
                            <div class="block-item">
                                A grounded theory of medical research synthesis
                            </div>
                            <span class="postfix" style=";"> 02-13-20</span>


                            <div class="block-item">
                                <a data-toggle="tab" href="#mri"> MRI and Alzheimers
                                    Magnetic Resonance Imaging Comparisons of Demented and Nondemented Adult</a>
                            </div>
                            <span class="postfix"> 02-14-20</span>

                            <div class="block-item">
                                Using the Wisconsin breast
                                cancer diagnostic
                                data set for predictive analysis
                            </div>
                            <span class="postfix"> 02-15-20</span>

                        </div> <!-- end of Project grid-block -->


                        <!-- Docs block-->
                        <div class="grid-block">
                            <div class="block-header">
                                <span class="block-title"> Docs</span>
                                <span class="block-nav"> Modified</span>
                            </div>

                            <div>
                                <span class="block-item"> Rough Draft: Grounded theory of research synthesis</span>
                                <span class="postfix"> 01-02-19</span>
                            </div>

                            <div>
                                <div class="block-item"><a href="#">
                                        Clean Draft: MRI and Alzheimers Magnetic Resonance Imaging Comparisons of
                                        Demented and Nondemented Adult </a></div>
                                <div class="postfix"> 01-02-19</div>
                            </div>

                            <div>
                                <div class="block-item" style="float:left;"> 3rd Draft: Using the Wisconsin breast
                                    cancer diagnostic data set for predictive analysis
                                </div>
                                <div class="postfix"> 01-02-19</div>
                            </div>

                            <div>
                                <div class="block-item" style="float:left;"> 2nd Draft: Using the Wisconsin breast
                                    cancer diagnostic data set for predictive analysis
                                </div>
                                <div class="postfix"> 01-02-19</div>
                            </div>

                            <div>
                                <div class="block-item" style="float:left;"> 1st Draft: Using the Wisconsin breast
                                    cancer diagnostic data set for predictive analysis
                                </div>
                                <div class="postfix"> 01-02-19
                                </div>
                            </div>
                            <div>
                                <div class="block-item" style="float:left;"> Using the Wisconsin breast
                                    cancer diagnostic data set for predictive analysis
                                </div>
                                <div class="postfix"> 01-02-19
                                </div>
                            </div>
                            <div>
                                <div class="block-item" style="float:left;"> Using the Wisconsin breast
                                    cancer diagnostic data set for predictive analysis
                                </div>
                                <div class="postfix"> 01-02-19
                                </div>
                            </div>
                        </div> <!-- End of Docs block-->


                        <!-- Tasks Block -->
                        <div class="grid-block">
                            <div class="block-header">
                                <a data-toggle="tab" href="#tasks"> <span class="block-title"> Tasks</span></a>
                                <span class="block-nav"> Date due</span>
                            </div>

                            <div>
                                <div class="block-item">
                                    <i class="fas fa-check"></i>

                                    <a href="#">Analyze the grounded theory dataset </a>
                                </div>
                                <div class="postfix">
                                    07-06-19
                                </div>
                            </div>

                            <div>
                                <div class="block-item">
                                    <i class="fas fa-question"></i>
                                    <a href="../dashboard.php ">
                                        MRI and Alzheimers
                                        Magnetic Resonance Imaging Comparisons of Demented and Nondemented Adult</a>
                                </div>
                                <div class="postfix">
                                    02-19-19
                                </div>
                            </div>

                            <div>
                                <div class="block-item">
                                    Using the Wisconsin breast
                                    cancer diagnostic
                                    data set for predictive analysis
                                </div>
                                <div class="postfix">02-19-19</div>
                            </div>

                            <div>
                                <div class="block-item">
                                    Using the Wisconsin breast
                                    cancer diagnostic
                                    data set for predictive analysis
                                </div>
                                <div class="postfix">02-19-19</div>
                            </div>

                            <div>
                                <div class="block-item">
                                    Using the Wisconsin breast
                                    cancer diagnostic
                                    data set for predictive analysis
                                </div>
                                <div class="postfix">02-19-19</div>
                            </div>

                            <div>
                                <div class="block-item">
                                    Using the Wisconsin breast
                                    cancer diagnostic
                                    data set for predictive analysis
                                </div>
                                <div class="postfix">02-19-19</div>
                            </div>

                            <div>
                                <div class="block-item">
                                    Using the Wisconsin breast
                                    cancer diagnostic
                                    data set for predictive analysis
                                </div>
                                <div class="postfix">02-19-19</div>
                            </div>

                            <div>
                                <div class="block-item">
                                    Using the Wisconsin breast
                                    cancer diagnostic
                                    data set for predictive analysis
                                </div>
                                <div class="postfix">02-19-19</div>
                            </div>
                        </div> <!-- End of Assignments block -->


                        <!-- Files Block-->
                        <div class="grid-block">
                            <div class="block-header">
                                <span class="block-title"> Files & Datasets </span>
                                <span class="block-nav"> Contributor </span>
                            </div>

                            <div>
                                <div class="block-item">
                                    A grounded theory of medical
                                    research synthesis
                                </div>
                                <div class="postfix"> Dr. Dennis</div>
                            </div>

                            <div>
                                <div class="block-item"><a href="../dashboard.php"> MRI and Alzheimers images </a>
                                </div>
                                <div class="postfix"> Dr. Smith</div>
                            </div>

                            <div>
                                <div class="block-item">
                                    Wisconsin breast cancer diagnostic data set
                                </div>
                                <div class="postfix"> Dr. Chen</div>
                            </div>
                        </div>  <!-- end of Files block -->
                    </div> <!-- end of Content Grid Container -->
                </div> <!-- end of Dashboard Wrapper-->
            </div> <!-- end of Content of Dashboard -->

            <div id="mri" class="tab-pane fade ">

                <!-- project Info: heading & basics-->
                <div style="border: 1px ">
                    <header id="overview">

                        <!--heading-->
                        <div>
                            <span style="color: darkgray; font-size: 14px">project: </span>
                            <span style="font-size: 2em"> MRI and Alzheimers </span>
                        </div>

                        <!--basics-->
                        <div>
                            <div style="font-size: 14px">
                                <div> Contributors: <span
                                            style="text-decoration-line: underline">Larry Dennis</span>,
                                    Grant,
                                    T.Y.
                                </div>
                                <div> Date created: Last Friday</div>
                                <div> Category: Project</div>
                                <div><span>Description: </span> <span
                                            style="color: #dddddd">Add a description of the project</span></div>
                                <div><span>License: </span><span style="color: #dddddd">Add a license</span></div>
                            </div>
                        </div>
                    </header>
                </div>


                <br>


                <!-- project Elements-->
                <div style="overflow: hidden; margin: 0; padding: 0; position: relative; border: 1px solid lightgray ; width:50%; display: inline-grid">

                    <!--Project Actitivities -->
                    <div class=""
                         style="position: relative;   border: 1px; margin:5px; padding-bottom: 5px; ">
                        <!--title-->
                        <div style="font-weight: 600; color: darkgrey; font-size: 16px;  border: solid 1px lightgray; background-color: #dddddd; padding: 5px 0 3px 3px;">
                            Project Activities
                        </div>
                        <!-- entries -->
                        <div>
                            <div style="margin-left: 15px; padding: 5px 0 0 5px; ">
                                <ul>
                                    <li>Grant added addon Dropbox to projectTitle</li>
                                    <li>Tsangyao Chen created ccc</li>
                                    <li>Larry approved the creation of project newProjectXXX</li>
                                    <input type="checkbox"
                                           style="  position: relative; top: 5px; left: -20px; height: 20px; width: 25px; background-color: #eee; margin-right: -20px">New
                                    Data Analysis assigned to you by Dr. Smith</input>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!--Tags-->
                    <div class=""
                         style="position: relative;   border: 1px ; display:; margin:5px; padding-bottom: 10px; ">
                        <!-- title-->
                        <div style=" font-weight: 600; color: darkgray; border: solid 1px lightgray; background-color: #dddddd; padding: 5px 0 3px 3px;">
                            <span> Tags </span>
                        </div>
                        <!-- entries -->
                        <div style="font-weight: 200; margin-bottom: 0; line-height: ">
                            <div style="padding: 5px 0 0 5px; "><span> fMRI; cognitive dissonance; front lobe; cognitive bias; dual-process theory; reasoning  </span>
                            </div>
                            <div>
                                <input style="margin: 0; padding: 3px 10px 0 5px; margin-top: 15px; width: 100%; height: 35px"
                                       placeholder="Add tags to enhance discoverability"></input></div>
                        </div>
                    </div>

                    <!--Wiki-->
                    <div class=""
                         style="position: relative;   border: 1px ; display:; margin:5px; padding-bottom: 10px; ">
                        <!-- title-->
                        <div style=" font-weight: 600; color: darkgray; border: solid 1px lightgray; background-color: #dddddd; padding: 5px 0 3px 3px;">
                            <span> Wiki </span>
                        </div>
                        <!-- entries -->
                        <div style="font-weight: 200; margin-bottom: 0">
                            <div style="padding: 5px 0 0 5px; ">
                                <ul style="margin-bottom: 0">
                                    <li> Functional magnetic resonance imaging or functional MRI (fMRI) measures
                                        brain
                                        activity
                                        by detecting changes associated with blood flow. This technique relies on
                                        the fact
                                        that
                                        cerebral blood flow and neuronal activation are coupled...
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <input style=" margin: 0; padding: 3px 10px 0 5px; margin-top: 15px; width: 100%; height: 75px; vertical-align: top"
                                       placeholder="Add a new wiki entry">
                                </input>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- right Column-->
                <!-- File actitives-->
                <div class=""
                     style="margin: 0; padding: 0;position: relative; left: 2%; top: 95px; border: 1px solid lightgray; width: 47%; display: inline-grid">
                    <div class="" style="position: relative;  border: 1px ; margin:5px; padding-bottom: 5px ">
                        <!--title-->
                        <div style="font-weight: 600; color: darkgrey; font-size: 16px;  border: solid 1px lightgray; background-color: #dddddd; padding: 5px 0 3px 3px;">
                            Files Activities
                            <span style="font-size: 12px; font-weight: 100; color: darkgray; position: relative; left: 40%; display: inline-block; text-align: right; justify-content: right"> ==> File Manager</span>
                        </div>
                        <span> Drag and drop files below to upload. </span>

                        <div class=""
                             style="position: relative;  border: 1px dashed #7a7a7a; border-radius: 2px; width: ; height: 45px; background-color: #ebebeb; margin:5px 0 5px 5px">

                        </div>

                        <!-- entries: file activities -->

                    </div>

                    <div class=""
                         style="position: relative;  border: ; width: ; display: ; margin:5px ">
                        <div><input type="checkbox"
                                    style="  position: relative; top: 5px; left: 5px; height: 20px; width: 25px; background-color: #eee; margin-right: -5px">
                            Approve deletion of critical file fMRI021067-1.png?</input>
                        </div>
                        <div><input type="checkbox"
                                    style="  position: relative; top: 5px; left: 5px; height: 20px; width: 25px; background-color: #eee; margin-right: -5px">
                            Approve deletion of critical file fMRI021067-2.png?</input>
                        </div>
                        <div><input type="checkbox"
                                    style="  position: relative; top: 5px; left: 5px; height: 20px; width: 25px; background-color: #eee; margin-right: -5px">
                            Approve deletion of critical file fMRI021067-3.png?</input>
                        </div>

                        <div style="margin-left: 15px; padding: 15px 0 0 15px; ">
                            <ul>
                                <li>Larry granted added addon Dropbox to MRI</li>
                                <li>Tsangyao Chen created ccc</li>
                                <li>Larry approved the creation of project newProject</li>
                            </ul>
                        </div>
                        <div>
                            <div><input type="checkbox"
                                        style="  position: relative; top: 5px; left: 5px; height: 20px; width: 25px; background-color: #eee; margin-right: -5px">
                                Approve full access request to critical file fMRI021067-100.png by John Doe?</input>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>  <!-- end of Tab-Content -->
    </div> <!-- end of Container -->

    <?php
}
?>