<?php

$db_host = "localhost";
$db_name = "root";
$db_pass = "root";
$db_data = "onlinestockdb";

$dbc = mysqli_connect($db_host,$db_name,$db_pass,$db_data) or die(mysqli_error());
?>