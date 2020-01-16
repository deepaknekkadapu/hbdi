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

                    <input style="width: 500px;  padding: 5px 6px; border-radius: 2px; text-align: left"
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


            <div id="documents" class="tab-pane fade">
                <h3> Documents </h3>
                <p> Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>


                <p>Allagui, A.,
                    &
                    Lemoine, J.
                    (
                    2007
                    )
                    . Web interface and consumers buying intention in e-tailing: Results from an online experiment. In S. Borghini, M. A. McGrath,
                    &
                    C. Otnes
                    (
                    Eds.
                    )
                    ,
                    E-European Advances in Consumer Research
                    (
                    Vol.
                    8
                    ,
                    pp.
                    24
                    –30
                    )
                    .</p>
                <p>Cleverley, P. H.,
                    &
                    Burnett, S.
                    (
                    2018
                    )
                    . Enterprise search and discovery capability: The factors and generative mechanisms for user satisfaction. Journal of Information Science,
                    0165551518770969
                    . https:
                    /
                    /
                    doi.org
                    /
                    10.1177
                    /
                    0165551518770969
                <p>Croson, R.,
                    &
                    Gächter, S.
                    (
                    2010
                    )
                    . The science of experimental economics. Journal of Economic Behavior & Organization,
                    73
                    (
                    1
                    )
                    ,
                    122
                    –131. https:
                    /
                    /
                    doi.org
                    /
                    10.1016
                    /
                    j.jebo
                    .2009
                    .09
                    .008
                <p>Eriksson, K.
                    (
                    2012
                    )
                    . The nonsense math effect. Judgment and Decision Making,
                    7
                    (
                    6
                    )
                    ,
                    746
                    .
                <p>Levitt, S. D.,
                    &
                    List, J. A.
                    (
                    2009
                    )
                    . Field experiments in economics: The past, the present, and the future. European Economic Review,
                    53
                    (
                    1
                    )
                    ,
                    1
                    –18. https:
                    /
                    /
                    doi.org
                    /
                    10.1016
                    /
                    j.euroecorev
                    .2008
                    .12
                    .001
                <p>List, J. A.,
                    &
                    Rasul, I.
                    (
                    2011
                    )
                    . Chapter
                    2
                    -
                    Field Experiments in Labor Economics. In O. Ashenfelter & D. Card
                    (
                    Eds.
                    )
                    ,
                    Handbook of Labor Economics
                    (
                    Vol.
                    4
                    ,
                    pp.
                    103
                    –228
                    )
                    . https:
                    /
                    /
                    doi.org
                    /
                    10.1016
                    /
                    S0169-7218
                    (
                    11
                    )
                    00408
                    -
                    4
                <p>List, J. A., Sadoff, S.,
                    &
                    Wagner, M.
                    (
                    2011
                    )
                    . So you want to run an experiment, now what? Some simple rules of thumb for optimal experimental design. Experimental Economics,
                    14
                    (
                    4
                    )
                    ,
                    439
                    . https:
                    /
                    /
                    doi.org
                    /
                    10.1007
                    /
                    s10683-011-9275-7
                <p>Litman, L., Robinson, J.,
                    &
                    Abberbock, T.
                    (
                    2017
                    )
                    . TurkPrime.com: A versatile crowdsourcing data acquisition platform for the behavioral sciences. Behavior Research Methods,
                    49
                    (
                    2
                    )
                    ,
                    433
                    –442. https:
                    /
                    /
                    doi.org
                    /
                    10.3758
                    /
                    s13428-016-0727-z
                <p>Lovejoy, B.
                    (
                    2017
                    ,
                    August
                    9
                    )
                    . Apple’s R& D spend up
                    15
                    %
                    ,
                    now at similar level to iPhone development period. Retrieved December
                    14
                    ,
                    2017
                    ,
                    from
                    9
                    to5Mac website: https:
                    /
                    /
                    9
                    to5mac.com
                    /
                    2017
                    /
                    08
                    /
                    09
                    /apple-rd-spend/
                <p>Panzarino, M.
                    (
                    2012
                    ,
                    January
                    24
                    )
                    . This is how Apple’s top secret product development process works. Retrieved December
                    14
                    ,
                    2017
                    ,
                    from The Next Web website: https:
                    /
                    /
                    thenextweb.com /apple/
                    2012
                    /
                    01
                    /
                    24
                    /this-is-how-apples-top-secret-product-development-process-works/
                <p>Smith, V. L.
                    (
                    2010
                    )
                    . Theory and experiment: What are the questions? Journal of Economic Behavior & Organization,
                    73
                    (
                    1
                    )
                    ,
                    3
                    –15. https:
                    /
                    /
                    doi.org
                    /
                    10.1016
                    /
                    j.jebo
                    .2009
                    .02
                    .008
                <p>Todd, R. J.
                    (
                    1999
                    a
                    )
                    . Back to our beginnings: Information utilization, Bertram Brookes and the fundamental equation of information science. Information Processing & Management,
                    35
                    (
                    6
                    )
                    ,
                    851
                    –870. https:
                    /
                    /
                    doi.org
                    /
                    10.1016
                    /
                    S0306-4573
                    (
                    99
                    )
                    00030
                    -
                    8
                <p>Todd, R. J.
                    (
                    1999
                    b
                    )
                    . Utilization of heroin information by adolescent girls in Australia: A cognitive analysis. Journal of the American Society for Information Science,
                    50
                    (
                    1
                    )
                    ,
                    10
                    –23. https:
                    /
                    /
                    doi.org
                    /
                    10.1002
                    /
                    (
                    SICI
                    )
                    1097
                    -
                    4571
                    (
                    1999
                    )
                    50
                    :
                    1
                    <
                    10
                    ::AID-ASI4 >
                    3.0
                    .CO
                    ;
                    2
                    -B
                <p>Wuerthele, M.,
                    &
                    Owen, M.
                    (
                    2017
                    ,
                    August
                    9
                    )
                    . Though Apple’s R& D spending is massive, it’s still more efficient than all other competitors. Retrieved December
                    14
                    ,
                    2017
                    ,
                    from AppleInsider website:
                    /
                    /
                    appleinsider.com /articles/
                    17
                    /
                    08
                    /
                    09
                    /
                    though-apples-rd-spending-is-massive-its-still-more-efficient-than-all-other-competitors

            </div>

            <div id="tasks" class="tab-pane fade">
                <h3> Tasks </h3>
                <p> Tasks Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                <p> Special research tasks do not give a daily stamp
                    -
                    only field research does
                <p> Minimum level for Special Research is level
                    5
                <p>Pokemon encounters appear to be at level
                <p>Many players have a “refill loop” or “grind loop” of stops and gyms in their PoGo lives, often one they hit multiple times each day.. If you have the option, add a second loop. Having multiple loops will greatly increase the number of tasks seen

                <p>Try to keep one open task so you can always pick a new one up when you visit a Pokestop for the first time in a day.

                <p>Find a network of players to report tasks, perhaps through your raid chat of choice. You won’t be able to check every stop, so if people call out TM, Rare Candy or Chansey quests it can really help.

                <p>Some communities have focused on calling out Charmander encounter quests. This is a great way to farm high IV Pokemon before a community day.

                <p>Some encounters have very large hit-boxes. Save these for when you are working on a
                    3
                    excellent or
                    3
                    great throw in a row quest.

                <p>Try not to hold more than
                    1
                    long term quest. Remember there is an opportunity cost to holding
                    3
                    “Catch a Ditto for
                    3
                    Rare Candy” tasks. Obviously the payoff is awesome, but in the meantime you are missing out on so many other potential rewards from other tasks you cannot get.
            </div>


            <div id="reports" class="tab-pane fade">
                <h3> Reports </h3>
                <p> Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
            </div>


            <div id="participants" class="tab-pane fade">
                <h3> Participants </h3>
                <p> Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                <img src="../images/Project-research-team.png" width="600">

            </div>


            <div id="settings" class="tab-pane fade">
                <h3> Settings </h3>
                <p> Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
            </div>
        </div>  <!-- end of Tab-Content -->
    </div> <!-- end of Container -->

    <?php
}
?>