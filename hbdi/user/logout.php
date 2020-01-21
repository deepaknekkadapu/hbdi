<?php
include('../includes/includes.php');
?>

<div class="container" style="width: 90%; max-width: 900px">
    <div class="php-message">
        <div>

            <!-- ########### clear session ############ -->
            <?php
            echo "<span class = ''> Logging " . $_SESSION['username_hbdi'] . " out..." . "</span>";
            unset($_SESSION['username_hbdi']);
            unset($_SESSION['email_hbdi']);
            echo '<meta http-equiv=REFRESH CONTENT=1;url=../index.php>';
            ?>

        </div>
    </div>
</div>