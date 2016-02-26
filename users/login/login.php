<?php
$uname = $_REQUEST['uname'];
$upass = $_REQUEST['upass'];
$red_uri = $_REQUEST['red_uri'];
include("../../common/config.php");
$query = "SELECT * FROM os_users WHERE os_users.uName = '$uname' AND os_users.uPass = '".md5($upass)."'";
if($row = mysqli_fetch_row(mysqli_query($dbc,$query)))
{
session_start();
$_SESSION['os_cur_user']=$row[1];
$_SESSION['os_cur_disp']=$row[0];
?>
<script>
$("#table-login").remove();
$("#div-error").remove();
$("#div-page").append("Hello, <?php echo $_SESSION['os_cur_disp']; ?>! Welcome back.<br><br>Click <a href='<?php echo $red_uri; ?>' class='btn' green>here</a> to continue . . <br><br>Or Click <a href='/' class='btn' green>here</a> to go Home . . .");
</script>
<?php
}
else
echo "Invalid e-Mail or Password";
?>