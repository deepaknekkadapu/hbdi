<?php
include('includes/includes.php');
?>

<?php
if (!isset($_SESSION['email_hbdi'])) {
    echo '<meta http-equiv=REFRESH CONTENT=0;url=./user/login.php>';
} else {
    ?>


    <div class="container" style="max-width: 900px">
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
                    <a href="dashboard.php ">
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
        </div>
    </div>


<?php } ?>