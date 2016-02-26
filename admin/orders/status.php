<?php
    $order = $_REQUEST['order'] or die("Sorry");
    $status = strtoupper($_REQUEST['status']) or die("Sorry");
    include("../../common/config.php");
    if($status == 'R')
    {
        $query = "SELECT quantity, productId FROM os_orders WHERE orderId = '".$order."'";
        $result = mysqli_query($dbc, $query) or die(mysqli_error($dbc));
        $row = mysqli_fetch_row($result);
        $query = "UPDATE os_products SET Stock = Stock + ".intval($row[0])." WHERE Id = '".$row[1]."'";
        mysqli_query($dbc, $query) or die(mysqli_error($dbc));
    }
    $query = "UPDATE os_orders SET status = '".$status."' WHERE orderId = '".$order."'";
    mysqli_query($dbc, $query) or die(mysqli_error($dbc));
    echo "<script>window.location.reload()</script>";
?>
