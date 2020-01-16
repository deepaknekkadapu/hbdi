<div>
    <!--content container-->
    <div style="margin: auto; padding: 0; width: 70%; max-width: 900px">

        <!--project Banner-->
        <div style="position: relative; margin: auto; top: 38px; height: 36px; width: 100%">

            <div class="nav2" style="position: relative; text-align: left; margin: 0">

                <div style="height: 34px">
                    <ul style=" list-style-type: none; position: relative; padding: 0;
                    overflow: hidden; color: darkgrey">

                        <li style="display: inline; float:left;  ">
                            <div style="display: inline">
                                <select>
                                    <option value="0">Select project:</option>
                                    <option value="0" selected>MRI</option>
                                    <option value="0">Cancer</option>
                                    <option value="0">Meta Analysis</option>
                                    <option value="0">This is a long title</option>
                                    <!--                                    <option value="0">This is a very very very long title for testing purpose </option>-->
                                </select>
                            </div>
                        </li>

                        <button id="myBtn">
                            <li style=" ">
                                Documents
                            </li>
                        </button>
                        <div id="myModal" class="modal">

                            <!-- Modal content -->
                            <div class="modal-content">
                                <span class="close">&times;</span>
                                <p> Doc 1 <br> Doc 2 <br> Doc 3...</p>
                            </div>
                            <script>
                                // Get the modal
                                var modal = document.getElementById("myModal");

                                // Get the button that opens the modal
                                var btn = document.getElementById("myBtn");

                                // Get the <span> element that closes the modal
                                var span = document.getElementsByClassName("close")[0];

                                // When the user clicks the button, open the modal
                                btn.onclick = function () {
                                    modal.style.display = "block";
                                }

                                // When the user clicks on <span> (x), close the modal
                                span.onclick = function () {
                                    modal.style.display = "none";
                                }

                                // When the user clicks anywhere outside of the modal, close it
                                window.onclick = function (event) {
                                    if (event.target == modal) {
                                        modal.style.display = "none";
                                    }
                                }
                            </script>

                        </div>

                        <li style=" ">
                            Tasks
                        </li>

                        <li style="; ">
                            Reports
                        </li>

                        <li style="; ">
                            Participants
                        </li>


                        <li style="; ">
                            Settings
                        </li>
                    </ul>
                </div>
            </div>
        </div>


        <!--        project Description-->
        <div id="projectScope"
             style="position: relative; top: 50px; border: 1px solid lightgray">
            <header id="overview">

                <!--heading-->
                <div>
                    <span style="color: darkgray; font-size: 14px">project: </span><span
                            style="font-size: 2em"> MRI </span>
                </div>

                <!--description-->
                <div>
                    <div style="font-size: 14px">
                        <div> Contributors: <span style="text-decoration-line: underline">Larry Dennis</span>, Grant,
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

        <!--        project Elements-->
        <!--        <div style="position: relative; left: 10%; display: block; border: 1px solid red; margin: 0; width: 75%; padding-top: 10px">-->
        <!-- left Column-->
        <div class=""
             style="overflow: hidden; margin: 0; padding: 0; position: relative; top: 95px; border: 1px solid lightgray ; width:50%; display: inline-grid">

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
            <div class="" style="position: relative;   border: 1px ; display:; margin:5px; padding-bottom: 10px; ">
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
            <div class="" style="position: relative;   border: 1px ; display:; margin:5px; padding-bottom: 10px; ">
                <!-- title-->
                <div style=" font-weight: 600; color: darkgray; border: solid 1px lightgray; background-color: #dddddd; padding: 5px 0 3px 3px;">
                    <span> Wiki </span>
                </div>
                <!-- entries -->
                <div style="font-weight: 200; margin-bottom: 0">
                    <div style="padding: 5px 0 0 5px; ">
                        <ul style="margin-bottom: 0">
                            <li> Functional magnetic resonance imaging or functional MRI (fMRI) measures brain activity
                                by detecting changes associated with blood flow. This technique relies on the fact that
                                cerebral blood flow and neuronal activation are coupled...
                            </li>
                        </ul>
                    </div>
                    <div>
                        <input style=" margin: 0; padding: 3px 10px 0 5px; margin-top: 15px; width: 100%; height: 75px"
                               placeholder="Add a new wiki entry"></input></div>
                </div>
            </div>
        </div>


        <!-- right Column-->
        <!--        file actitives-->
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
</div>


