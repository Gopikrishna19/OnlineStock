<?php
    include("../../../common/config.php");
    $query = "UPDATE os_comments SET viewed = 1 WHERE Id = '".$_REQUEST['id']."'";
    mysqli_query($dbc,$query) or die(mysqli_error($dbc));
?>