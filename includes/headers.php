<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include('db_conn.php');

$server_name = $_SERVER['SERVER_NAME'];
if ($server_name == 'tychen.us'){
    $path = 'tychen.us/hbdi';
    $p = 'https://tychen.us/hbdi';
} else {
    $path = 'localhost';
    $p = 'http://192.168.60.107';
}

?>


<head>

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">


    <link rel="stylesheet" type="text/css" href="https://tychen.us/hbdi/styles/main.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Open+Sans|Ubuntu:400,500">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Open+Sans|Playfair+Display|Roboto|Ubuntu">

    <link rel="icon" href="../images/favicon_io/favicon-32x32.png" type="image/x-icon">
    <link rel="icon" href="http://tychen.us/hbdi/images/favicon_io/favicon-32x32.png">

    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <link href="css/bootstrap-datetimepicker.css" rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
    <script src="https://kit.fontawesome.com/58914d790c.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.1/umd/popper.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!-- DateTime picker -->
    <script src="js/bootstrap-datetimepicker.min.js"></script>


    <!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">-->
    <!--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <!--    testing datetime picker -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/momentjs/2.14.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>

    <title>
        HBDI@FSU
    </title>


</head>


