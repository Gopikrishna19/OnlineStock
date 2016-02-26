<?php 
include("../../../common/config.php");
$id = $_REQUEST['id'];
$price = $_REQUEST['price'];
$stock = $_REQUEST['stock'];
$disc = $_REQUEST['disc'];
$avail = $_REQUEST['avail'];
$query = "UPDATE os_products SET Stock = ".$stock.", Price = ".$price.", Discount = ".$disc.", Available = ".$avail." WHERE Id = '".$id."'";
mysqli_query($dbc, $query) or die(mysqli_error($dbc));
echo "Updated Successfully!<br>Refreshing . . .";
?>