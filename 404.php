<?php
include('./includes/topnav.php');
?>

<div class="container" style="width: 90%; max-width: 900px">


    <!-- beginning of 404 box -->
    <div style="margin: 0 auto; max-width: 400px; padding: 100px 0; text-decoration: none">

        <div style="border: ; width: 100%; padding: 0 auto; height: auto;">

            <!--    HBDI 404 Header -->
            <header style="position: relative;  margin: auto; height: auto; background-color: #dddddd; text-decoration: none">
                <div style="text-align: center; text-decoration: none">
                    <span style=" font-size: 2em; width: 100%; text-decoration: none">404!</span>
                </div>
                <div style="top: 75px; padding-bottom: 10px; text-align: center; text-decoration: none">
                    <?php
                    //                    echo $_SERVER['REQUEST_URI'];
                    ?>
                    <strong> The page you requested is not found. </strong>
                </div>
                <div style="top: 75px; padding-bottom: 10px; text-align: center; text-decoration: none">
                    <strong>Redirecting you to the home page. </strong>
                    <meta http-equiv="Refresh" content="3; url=https://tychen.us/hbdi/index.php">
                </div>
            </header>
        </div>
    </div>
</div>


