<?php
include("../../common/config.php");
$query = "SELECT * FROM os_address WHERE userId = '".$_REQUEST['id']."'";
$result = mysqli_query($dbc, $query) or die(mysqli_error($dbc));
if($row = mysqli_fetch_row($result))
{
?>
<ul style="padding: 0px; margin: 0px; list-style: none">
    <li><?php echo $row[1]; ?></li>
    <li><?php echo $row[2]; ?></li>
    <li><?php echo $row[3]; ?></li>
    <li>PIN: <?php echo $row[4]; ?></li>
</ul>
<?php
}
else
{
    echo "<p>No address provided</p>";
}
?>