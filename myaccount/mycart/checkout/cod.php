<?php
    $uname = base64_decode($_REQUEST['un']);
    if($_REQUEST['method'] == 1){
        header("Location: http://makepayment.in/pay?un=".$_REQUEST['un']."&ud=".$_REQUEST['ud']."&am=".$_REQUEST['am']);
    }
    else
    {
        include("../../../common/config.php");
        $query = "SELECT userId, productId, quantity, ROUND((os_products.Price * (1 - os_products.Discount / 100) * quantity), 2) as amount ".
                 "FROM os_usercart, os_products WHERE userId = '".$uname."' AND os_products.Id = productId";
        $result = mysqli_query($dbc, $query) or die(mysqli_error($dbc));
        while($row = mysqli_fetch_row($result))
        {
            $orderId = sha1($row[1].$row[0].date("d-m-Y"));
            $query = "INSERT INTO os_orders VALUES('".$orderId."','".$row[1]."','".$row[0]."',CURRENT_TIMESTAMP,".$row[3].",".$row[2].",'O','CD')";
            mysqli_query($dbc,$query) or die(mysqli_error($dbc));
            $query = "UPDATE os_sold SET quantity = quantity + ".intval($row[2])." WHERE productId = '".$row[1]."'";
            mysqli_query($dbc,$query) or die(mysqli_error($dbc));
            $query = "UPDATE os_products SET Stock = Stock - ".intval($row[2])." WHERE Id = '".$row[1]."'";
            mysqli_query($dbc,$query) or die(mysqli_error($dbc));
            $query = "DELETE FROM os_usercart WHERE userId = '".$row[0]."'";
            mysqli_query($dbc,$query) or die(mysqli_error($dbc));
        }
        header("Location: ../status?status=0");
    }
?>