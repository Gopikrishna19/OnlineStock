<?php

//$db_host = "mysql1.000webhost.com";
//$db_data = "a5605254_os";
//$db_name = "a5605254_gopi";
//$db_pass = "Supraja17";

$db_host = "localhost";
$db_data = "onlinestockdb";
$db_name = "root";
$db_pass = "root";


$dbc = mysqli_connect($db_host,$db_name,$db_pass,$db_data) or die(mysqli_error());
?>