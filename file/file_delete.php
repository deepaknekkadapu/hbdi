<?php
include('../includes/db_conn.php');

$check_files = $_POST['checked_files'];
echo $check_files;
$fileCheck = $_POST['filCheck'];

if (isset($check_files)) {
    $sql = "UPDATE files SET inactive = 1 WHERE id_file = 8";
    $pdo->prepare($sql)->execute();
    echo "Checked files marked as inactive";
} else {
    echo "Sigh...";
}

?>