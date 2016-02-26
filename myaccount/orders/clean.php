<?php
session_start();
include("../../common/config.php");
$query = "DELETE FROM os_orders WHERE userId='".$_SESSION['os_cur_user']."' AND status='R'";
$result = mysqli_query($dbc, $query);
echo "<script>window.location.reload()</script>"
?>