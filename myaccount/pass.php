<?php
    session_start();
    include("../common/config.php");
    $pass = md5($_REQUEST['pass']);
    $query = "UPDATE os_users SET uPass = '".$pass."' WHERE uName = '".$_SESSION['os_cur_user']."'";
    $res = mysqli_query($dbc, $query) or die(mysqli_error($dbc));
    if($res==1) echo "Password Successfully Changed";
    else echo "Failed to chage the password";
?>