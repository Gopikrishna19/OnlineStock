<?php
$query ="";
include("../../common/config.php");
switch($_REQUEST['mode'])
{
    case "maread" : $query = "UPDATE os_inbox SET viewed = 1"; break;
    case "dread" : $query = "DELETE FROM os_inbox WHERE viewed = 1"; break;
    case "dall" : $query = "DELETE FROM os_inbox"; break;
    case "muread" : $query = "UPDATE os_inbox SET viewed = 0 WHERE Id = '".$_REQUEST['id']."'"; break;
    case "mdel" : $query = "DELETE FROM os_inbox WHERE Id = '".$_REQUEST['id']."'"; break;
    case "mview" : $query = "UPDATE os_inbox SET viewed = 1 WHERE Id = '".$_REQUEST['id']."'"; break;
}
mysqli_query($dbc, $query) or die(mysqli_error($dbc));
?>