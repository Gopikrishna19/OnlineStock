<?php
if(isset($_REQUEST['btnRegister']) && isset($_REQUEST['uname']) && isset($_REQUEST['dname']) && isset($_REQUEST['upass']))
{
    $pp = "../../../";
    $pt = "Success | Registration";
    include("../../../common/header.php");
	include("../../../common/config.php");
	$query = "INSERT INTO os_users VALUES('".$_REQUEST['dname']."','".$_REQUEST['uname']."','".md5($_REQUEST['upass'])."')";
	mysqli_query($dbc,$query) or die(mysqli_error($dbc));
    $query = "DELETE FROM os_users WHERE dName = '' OR uName = ''";
    mysqli_query($dbc,$query) or die(mysqli_error($dbc));
    echo "<p class='list-head'>Successfully registered</p>";
    echo "<p>Click <a href='/users/login' class='btn'>here</a> to login ...<p>";
    include("../../../common/footer.php");
}
else
    header("Location : ../");
?>