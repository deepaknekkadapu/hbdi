<?php
include('../includes/includes.php');
?>


<div class="php-message">
    <div class="loader"></div>

    <!-- ########### clear session ############ -->
    <?php

    echo "<span class='php-message' > Logging " . $_SESSION['username_hbdi'] . " out..." . "</span>";

    session_destroy();

    echo '<meta http-equiv=REFRESH CONTENT=1;url=' . $p . 'tychen/index.php>';

    exit;
    ?>

</div>
