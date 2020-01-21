<?php
include('../includes/includes.php');
?>

<?php
if (!isset($email_hbdi)) {
    $email_hbdi = $_SESSION['email_hbdi'];
}
//echo $email;
?>
<div class="container" style="width: 90%; max-width: 900px">
    <div class="php-message">
        <div>
            <?php
            if (isset($_POST['submit'])) {
                $email = $_POST['email'];
                $password = $_POST['password'];

                try {
                    $stmt = $pdo->prepare("SELECT id_user, username, password, email FROM user WHERE email = '$email' ");
                    $stmt->execute();
                    $result = $stmt->fetch();
                    $hash = $result['password'];
                    $isValid = password_verify("$password", "$hash");
                    if (empty($result)) {
                        echo "Email not found. Redirecting to the sigin page...";
                        echo '<meta http-equiv=REFRESH CONTENT=5;url=login.php>';
                    } elseif (!$isValid) {
                        echo "Password incorrect. Please try again...";
                        echo '<meta http-equiv=REFRESH CONTENT=5;url=login.php>';
                    } else {
                        $_SESSION['email_hbdi'] = $result['email'];
                        $_SESSION['username_hbdi'] = $result['username'];
                        $_SESSION['id_user'] = $result['id_user'];
                        echo "<span>" . $result['username'] . " (UID:" . $_SESSION['id_user'] . ") is logged in successfully. </span> <br>";
                        echo "Redirecting to your dashboard...";
                        echo '<meta http-equiv=REFRESH CONTENT=2;url=../dashboard.php>';
                    }

                } catch (Exception $e) {
                    echo "Oops!";
                    echo $e;
                }
            }
            ?>
        </div>
    </div>
</div>
