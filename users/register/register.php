<?php
if(isset($_REQUEST['checkuser']))
{
	include("../../common/config.php");
	$query = "SELECT os_users.uName FROM os_users WHERE os_users.uName = '".$_REQUEST['email']."'";
	$result = mysqli_query($dbc,$query);
	if(mysqli_fetch_row($result))
		echo "<span style='color:#F00'>eMail already registered</span>";
	else
		echo "<span style='color:#484'>eMail Available";
}
?>