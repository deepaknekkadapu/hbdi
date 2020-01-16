<?php
echo "<form id='fileChkBox'>";
if (!isset($title_project_short)) {
    error_log("\$title_project_short is empty.", 0);
} else {
    $file_path = $_SERVER['DOCUMENT_ROOT'] . "/hbdi/projects/$username_hbdi/$title_project_short" . "_files/";
}
$files = scandir($file_path);
foreach ($files as $filename) {
    if (($filename != ".") AND ($filename != "..")) {
        try {
            $stmt = $pdo->prepare("
SELECT id_file, date_uploaded, compliance, id_project 
FROM files 
WHERE name_file = '$filename' AND id_project = '$id_project'");
            $stmt->execute();
            $result = $stmt->fetch();
            $id_file = $result['id_file'];
            $date_uploaded = $result['date_uploaded'];
            $compliance = $result['compliance'];
        } catch (PDOException $e) {
            echo "Oops!";
            echo $e->getMessage();
            exit();
        }
        $date_time = (date("m-d-y H:i:s", $date_uploaded));
        //                    if ($date_uploaded > 1980) {
        if ($id_file) {


            echo "
                        <div class='content-item-wrap'>
                            <input class='content-item' style='margin-right: 2px; width: 15px;' type='checkbox' name='fileCheck' id='$id_file' value='$id_file' onclick='loadMenu()'> 
                            <div class='content-item' style='width: 50%;'>  $filename  </div> 
                            <div class='content-item' style='width: 26%;'>  $compliance  </div> 
                            <div class='content-item' style='width: 15%;'>  $date_time  </div> 
                            <div class='content-item' style='width: 5%;'>  $id_file  </div>   
                        </div>
                            </form>";
        }

    }
};
?>