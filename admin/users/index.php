<?php 
$pt = 'Users List | Admin';
$adminmenu = TRUE;
$pp = "../../";
include("../../common/header.php"); 
if(!isset($_SESSION['os_cur_user']))
    echo "<script>$('#btnLogin').click();</script>";
include("../../common/config.php");
$query = "SELECT uName, dName FROM os_users";
$result = mysqli_query($dbc, $query) or die(mysqli_error($dbc));
echo "<table><tr><td class='table-h'>User Id</td><td class='table-h'>User Name</td></tr>";
while($row= mysqli_fetch_row($result))
{
    echo "<tr><td class='table-d'>".$row[0]."</td><td class='table-d'>".$row[1]."</td></tr>";
}
echo "</table>";
include("../../common/footer.php"); 
?>