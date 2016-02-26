<?php
    session_start();
    if(isset($_REQUEST['id']))
    {
        include("../../common/config.php");
        $query = "DELETE FROM os_usercart WHERE productId = '".$_REQUEST['id']."' AND userId = '".$_SESSION['os_cur_user']."'";
        mysqli_query($dbc, $query) or die(mysqli_error($dbc));
    }
    else
        echo "none";
?>