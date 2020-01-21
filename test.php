<?php

$doc_root = $_SERVER['DOCUMENT_ROOT'];
echo $doc_root, "<br>";

//error_log("test error log from test.php", 0)


$timestamp = strtotime('01/01/2019 12:00 AM');
echo $timestamp, "<br>";

echo "The present working directory: "  . __DIR__ . "<br>";

print_r( $_FILES);


//ini_set("log_errors", 1);
//ini_set("error_log",$_SERVER['DOCUMENT_ROOT']."/hbdi/test/error_log");
phpinfo();
?>