<?php
include('includes/headers.php');
include('includes/topnav.php');
include('includes/footer.php');
?>


<?php
if (!isset($_SESSION['email_hbdi'])) {
    echo '<meta http-equiv=REFRESH CONTENT=0;url=./user/login.php>';
} else {
    ?>






<?php } ?>
