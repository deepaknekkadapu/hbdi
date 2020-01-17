<?php
if (!isset($_SESSION['email_hbdi']) or
    !isset($_SESSION['username_hbdi']) or
    !isset($_SESSION['uid_hbdi'])) {
    ?>

    <script type="text/javascript">
        $('#theModal').modal('show');
    </script>

<!--    <div class="container" style="max-width: 900px; margin: auto;">-->
<!--        <div class='php-message'>-->
<!--            <div style="margin: auto" class='loader'></div>-->
<!--            <br>-->
<!--            <br>-->
<!--            <div style="padding-left: 45px">-->
<!--                You are not logged in. <br>-->
<!--                Redirecting to home...-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--    --><?php
//    $_SESSION['login_redirect'] = $_SERVER['PHP_SELF'];
//    echo '<meta http-equiv=REFRESH CONTENT=1;url="https://tychen.us/hbdi/index.php">';
//    exit();
}
//else {
//    $email_hbdi = $_SESSION['email_hbdi'];
//    $username_hbdi = $_SESSION['username_hbdi'];
//    $uid_hbdi = $_SESSION['uid_hbdi'];
//}
?>


<div id="theModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Please log in or sign up</h4>
            </div>
            <div class="modal-body">
                <p> You are not logged in. Please log in or sign up for a new account. </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
