<?php include "../includes/topnav.php" ?>

<?php
if (isset($_POST['submit_verify'])) {
    error_log("POSTed at signup_verify.php", 0);
    if ((isset($_POST['email'])) && (isset($_POST['token_email'])) && (isset($_POST['token_db']))) {
        $email = $_POST['email'];
        $token_email = $_POST['token_email'];
        $token_db = $_POST['token_db'];

        if ($token_email == $token_db) {
            $activation = " UPDATE user SET activated = ? ";
            $stmt = $pdo->prepare($activation);
            $stmt->execute([1]);
            echo "
        <div class='php-message'> Account activation was successful. <br>
        Taking you to the login page...
        </div> <br>";
            echo '<meta http-equiv=REFRESH CONTENT=3;url=./login.php>';
        }

    } else {
        echo "<div class='php-message'> OOPS! </div>";
    }
}
?>

<div class="container-fluid" id="divUserElement">
    hello, world
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <?php
            if ($_GET['key'] && $_GET['verify']) {
                $email = $_GET['key'];
                $token_email = $_GET['verify'];
                try {
                    $stmt = $pdo->prepare(" SELECT username, email, account_verify_token FROM user WHERE email = '$email' ");
                    $stmt->execute();
                    $result = $stmt->fetch();
//                    $conn->exec($sql);
                    if (isset($result)) {
                        $token_db = $result['account_verify_token'];
                    } else {
                        echo "<div class='php-message'> Hmmm... contact the admin </div>";
                    }
                } catch (Exception $exception) {
                    echo $exception->getMessage();
                }


                ?>
                <form method="post">
                    <input type="text" name="token_db" hidden
                           value="<?php echo $token_db; ?>">
                    <input type="text" name="token_email" hidden
                           value="<?php echo $token_email; ?>">
                    <input type="hidden" name="email" value="<?php echo $email; ?>">
                    <div class="php-message"> Click to confirm account creation:

                        <button type="submit" name="submit_verify" value="Confirm">
                            Confirm
                        </button>
                    </div>
                </form>
                <?php
            }
            ?>

        </div>
        <div class="col-sm-2"></div>
    </div>
</div>

