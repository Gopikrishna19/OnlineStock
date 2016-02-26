<?php
    session_start();
    include("../common/config.php");
    $addr1 = $_REQUEST['addr1'];
    $addr2 = $_REQUEST['addr2'];
    $state = $_REQUEST['state'];
    $pin = $_REQUEST['pin'];
    $query = "SELECT userId FROM os_address WHERE userId = '".$_SESSION['os_cur_user']."'";
    $res = mysqli_query($dbc, $query) or die(mysqli_error($dbc));
    if($row = mysqli_fetch_row($res))
    {
        $query = "UPDATE os_address SET address1 = '".$addr1."', address2 = '".$addr2."', ".
                 "state = '".$state."', PIN = '".$pin."' WHERE userId = '".$_SESSION['os_cur_user']."'";
    }
    else
    {
        $query = "INSERT INTO os_address VALUES('".$_SESSION['os_cur_user']."','".$addr1."','".$addr2."','".$state."','".$pin."')";
    }
    $res = mysqli_query($dbc, $query) or die(mysqli_error($dbc));
?>