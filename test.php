<?php

$doc_root = $_SERVER['DOCUMENT_ROOT'];
echo $doc_root, "<br>";

//error_log("test error log from test.php", 0)


$timestamp = strtotime('01/01/2019 12:00 AM');
echo $timestamp, "<br>";

echo "The present working directory: "  . __DIR__ . "<br>";


$server_name = $_SERVER['SERVER_NAME'];
echo "The SERVER_NAME is: $server_name";

//ini_set("log_errors", 1);
//ini_set("error_log",$_SERVER['DOCUMENT_ROOT']."/hbdi/test/error_log");


// the message
echo "sending an email: ";
$msg = "First line of text\nSecond line of text";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg, 70);

// send email
mail("tc16k@fsu.edu", "My subject", $msg);


phpinfo();
?>