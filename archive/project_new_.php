
<head>
    <link rel="stylesheet" type="text/css" href="../styles/form.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/momentjs/2.14.1/moment.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>


<div class="container">
    <form id="regForm" action="project_new_process.php" method="POST">

        <h1 style="font-size: 2em"> New Project </h1>

        <!-- One "tab" for each step in the form: -->

        <!-- Tab 1 -->
        <div class="tab">
            <label> Title:</label>
            <p><input placeholder="Project title..." type="text" name="title_project"></p>
            <p><input placeholder="Short title... (10 character maximum)" type="text" name="title_project_short""></p>

            <label>Granted By:</label>
            <div>
                <input type="checkbox" id="nih" name="nih" value="nih" style="float: left"> NIH <br>
            </div>
            <div>
                <input type="checkbox" name="hhs" value="hhs"> HHS<br>
            </div>
            <input type="checkbox" name="nsf" value="nsf"> NSF <br>
            <p> <button> + Granting agency </button></p>
            <p><input placeholder="Grant number..." name="grant_number"><br></p>

            <div style="display: flex; list-style: none; justify-content: space-between">

                <div class="form-group">
                    <label class="control-label" "> Project Beginning Date: </label>
                    <div class='input-group date' id='datetimepicker1'>
                        <input type='text' class="form-control"/>
                        <span class="input-group-addon">
                     <span class="glyphicon glyphicon-calendar"></span>
                     </span>
                        <script>
                            $(function () {
                                $('#datetimepicker1').datetimepicker();
                            });
                        </script>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">Estimated Completion Date: </label>
                    <div class='input-group date' id='datetimepicker2'>
                        <input type='text' class="form-control"/>
                        <span class="input-group-addon">
                     <span class="glyphicon glyphicon-calendar"></span>
                     </span>
                    </div>
                    <script>
                        $(function () {
                            $('#datetimepicker2').datetimepicker();
                        });
                    </script>
                </div>
            </div>
        </div>
        <!-- end of tab 1 -->


        <!-- Tab 2 Description -->
        <div class="tab">
            <label> Description: </label>
            <p><input placeholder="Project Description" type="text" name="project_description" style="height: 100px; "></p>
            <p><input placeholder="Key Words" type="text" name="key_words"></p>
            <p><input type="checkbox" name="HIPPA" value="HIPPA"> Project contains HIPPA data </p>


        </div>

        <!-- Tab 3 -->
        <div class="tab">
            <label> Members: </label>
            <p><input placeholder="Team Member 1..." type="text" name="team_member_1"></p>

            <p> + more members </p>

        </div>

        <div style="overflow:auto;">
            <div style="float:right;">
                <button type="button" id="prevBtn" onclick="nextPrev(-1)" style="background-color: lightgray">
                    Previous
                </button>
                <span> &nbsp; &nbsp;</span>
                <button type="button" id="nextBtn" onclick="nextPrev(1)" style="background-color: #bbbbbb">Next
                </button>
            </div>
        </div>
</div>

<!-- Circles which indicates the steps of the form: -->
<div style="text-align:center;margin-top:40px;">
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
<!--    <span class="step"></span>-->
</div>

<!--            <input type="submit">-->

</form>

</div>

<script type="text/javascript">
    $(".form_datetime").datetimepicker({format: 'yyyy-mm-dd hh:ii'});
</script>

<script>
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab

    function showTab(n) {
        // This function will display the specified tab of the form...
        var x = document.getElementsByClassName("tab");
        x[n].style.display = "block";
        //... and fix the Previous/Next buttons:
        if (n == 0) {
            document.getElementById("prevBtn").style.display = "none";
        } else {
            document.getElementById("prevBtn").style.display = "inline";
        }
        if (n == (x.length - 1)) {
            document.getElementById("nextBtn").innerHTML = "Submit";
        } else {
            document.getElementById("nextBtn").innerHTML = "Next";
        }
        //... and run a function that will display the correct step indicator:
        fixStepIndicator(n)
    }

    function nextPrev(n) {
        // This function will figure out which tab to display
        var x = document.getElementsByClassName("tab");
        // Exit the function if any field in the current tab is invalid:
        if (n == 1 && !validateForm()) return false;
        // Hide the current tab:
        x[currentTab].style.display = "none";
        // Increase or decrease the current tab by 1:
        currentTab = currentTab + n;
        // if you have reached the end of the form...
        if (currentTab >= x.length) {
            // ... the form gets submitted:
            document.getElementById("regForm").submit();
            return false;
        }
        // Otherwise, display the correct tab:
        showTab(currentTab);
    }

    function validateForm() {
        // This function deals with validation of the form fields
        var x, y, i, valid = true;
        x = document.getElementsByClassName("tab");
        y = x[currentTab].getElementsByTagName("input");
        // A loop that checks every input field in the current tab:
        for (i = 0; i < y.length; i++) {
            // If a field is empty...
            if (y[i].value == "") {
                // add an "invalid" class to the field:
                y[i].className += " invalid";
                // and set the current valid status to false
                valid = false;
            }
        }
        // If the valid status is true, mark the step as finished and valid:
        if (valid) {
            document.getElementsByClassName("step")[currentTab].className += " finish";
        }
        return valid; // return the valid status
    }

    function fixStepIndicator(n) {
        // This function removes the "active" class of all steps...
        var i, x = document.getElementsByClassName("step");
        for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
        }
        //... and adds the "active" class on the current step:
        x[n].className += " active";
    }
</script>

<!---->
<!--<script>-->
<!--    $('#regForm').submit(function () {-->
<!--        return false;-->
<!--    });-->
<!---->
<!--</script>-->