<?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Define server variables
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "demo_shop";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

 //Check connection
//if (!$conn) {
    //die("Connection failed: " . mysqli_connect_error());
//}




