<?php
    session_start();
    $id = $_REQUEST['id'];
    $count = intval($_REQUEST['count']);
    include("../../common/config.php");
    if($count == 0)
    {
        $query = "DELETE FROM os_usercart WHERE productId = '".$id."' AND userId = '".$_SESSION['os_cur_user']."'";
        mysqli_query($dbc, $query) or die(mysqli_error($dbc));
        echo "<script>window.location.reload()</script>";
    }
    elseif($count < 0)
    {
        echo "Invalid order value";
    }
    else
    {
        $query = "SELECT Stock FROM os_products WHERE Id = '".$id."'";
        if($row = mysqli_fetch_row(mysqli_query($dbc, $query)))
        {
            if($row[0] < $count)
            {
                echo "Sorry! The requested amount of quantity is not available currently<br>".
                     "The maximum availability of the product is ".$row[0];
            }
            else
            {
                $query = "UPDATE os_usercart SET quantity = ".$count." WHERE productId = '".$id."' AND userId = '".$_SESSION['os_cur_user']."'";
                mysqli_query($dbc, $query) or die(mysqli_error($dbc));
                echo "<script>window.location.reload()</script>";
            }
        }
    }
?>
