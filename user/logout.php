<?php
include('../includes/includes.php');
?>

<div class="container " style="width: 90%; max-width: 900px; background-color: white; border: none">
    <div class="">
        <!--        <div class="php-message">-->
        <!--            <div class="loader"></div>-->
        <!---->
        <!-- ########### clear session ############ -->
        <!--            --><?php
        //            echo "<span class='php-message'> Logging " . $_SESSION['username_hbdi'] . " out..." . "</span>";
        //            unset($_SESSION['username_hbdi']);
        //            unset($_SESSION['email_hbdi']);
        //            unset($_SESSION['id_user']);
        ////            unset($_SESSION['login_request']);  // no need because unset at login_process.php
        //            echo "<meta http-equiv=REFRESH CONTENT=1;url=$p/index.php>";
        //            ?>
        <!---->
        <!--        </div>-->
    </div>
</div>

<div>
    <div class="loader" style="position: relative; text-align: right"></div>

    <!-- ########### clear session ############ -->
    <?php
    echo "<span class='php-message' > Logging " . $_SESSION['username_hbdi'] . " out..." . "</span>";
    // ### clear sessions
    session_destroy();

    echo "<meta http-equiv=REFRESH CONTENT=1;url=$p/index.php>";
    exit;
    ?>

</div>
