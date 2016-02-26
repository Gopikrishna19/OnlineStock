<?php
include("config.php");
$key = isset($_REQUEST['key'])?$_REQUEST['key']:'';
$query = "SELECT os_products.Id, os_products.Name FROM os_products WHERE os_products.Name COLLATE UTF8_GENERAL_CI LIKE '%".$key."%' LIMIT 0,5";
$result= mysqli_query($dbc, $query) or die(mysql_error($dbc));
while($row = mysqli_fetch_row($result))
{
	echo "<a href='/getproduct?id=".$row[0]."'><div class='drop-down'>".$row[1]."</div></a>";
}
?>