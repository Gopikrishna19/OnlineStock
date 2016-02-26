<?php
    include("../common/config.php");
    $query = "INSERT INTO os_comments VALUE('".
                $_REQUEST['id']."','".
                $_REQUEST['product']."','".
                $_REQUEST['user']."','".
                $_REQUEST['disp']."',CURRENT_TIMESTAMP,'".
                mysqli_real_escape_string($dbc, $_REQUEST['comment'])."',0,'".
                $_REQUEST['rate']."')";
    mysqli_query($dbc,$query) or die(mysqli_error($dbc));
?>