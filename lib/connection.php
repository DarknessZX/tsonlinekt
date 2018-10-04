<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tsm";


$conn = mysqli_connect($servername, $username, $password, $dbname);
mysqli_query($conn,"SET NAMES 'utf8'");
