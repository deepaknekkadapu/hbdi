<?php
include("../includes/includes.php");
?>
<!--When INSERTing the project to DB, also create a directory w/ same name-->
<?php
$email = $_SESSION['email_hbdi'];


$title = $_POST['title'];
$title_short = $_POST['title_short'];
$granted_by = $_POST['granted_by'];
$grant_number = $_POST['grant_number'];
$nih = $_POST['nih'];
$hhs = $_POST['hhs'];
$nsf = $_POST['nsf'];
$grant_number = $_POST['grant_number'];
$date_begin = $_POST['date_begin'];
$date_completion_estimate = $_POST['date_completion_estimate'];
$project_description = $_POST['project_description'];
$key_words = $_POST[$key_words];
$hipaa = $_POST['hippa'];
$team_member1 = $_POST['team_member1'];

try {
//$sql = "INSERT INTO project VALUES (?)";
    $sql = "INSERT INTO project (title_project, title_short, granted_by, grant_number, nih, hhs, nsf, 
grant_number, date_begin, date_completion_estimate, project_description, hipaa)
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$title, $title_short, $granted_by, $grant_number, $nih, $hhs, $nsf,
        $grant_number, $date_begin, $date_completion_estimate, $project_description, $hipaa]);

    try {
        $dir = $_SERVER['DOCUMENT_ROOT'] . '/hbdi/projects/$email';
        if (!file_exists('$dir')) {
            mkdir('$dir', 0777, true);
        }
    } catch (Exception $e) {
        echo $e;
    }

} catch (Exception $e) {
    echo $e;
}
?>

<div style="width: 90%; margin: auto; align-items: center">
    <div style="font-size: 16px; margin: auto; width: 50%; background-color: #dddddd; text-align: center; margin-top: 10%">
        You have created a project: <?php echo $title; ?> </div>

</div>
