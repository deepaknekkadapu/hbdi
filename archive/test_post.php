<?php
$test = $_POST['test'];
if (isset($_POST['test'])) {
    echo "not null";
    if (!empty($test)) {
        echo "not empty";
    } else {
        echo "variable $test is empty";
    }
} else {
    echo "variable $test is null";
}