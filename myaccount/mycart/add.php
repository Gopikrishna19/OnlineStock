<?php
    $pp="../../";
    include("../../common/header.php");
    include("../../common/config.php");
    if(!isset($_SESSION['os_cur_user']))
        echo "<script>$('#btnLogin').click();</script>";
    if(isset($_REQUEST['product']))
    {
        $id = base64_decode($_REQUEST['product']);
        $query = "SELECT count(*), quantity FROM os_usercart WHERE productId = '".$id."' AND userId = '".$_SESSION['os_cur_user']."'";
        $row = mysqli_fetch_row(mysqli_query($dbc, $query));
        $count = intval($row[0]);
        if($count > 0)
        {
            $count = intval($row[1]);
            $count += 1;
            $query = "UPDATE os_usercart SET quantity = ".$count.
                     " WHERE productId = '".$id."' AND userId = '".$_SESSION['os_cur_user']."'";
        }
        else
        {
            $query = "INSERT INTO os_usercart VALUES('".$_SESSION['os_cur_user']."','".$id."',1)";
        }
        mysqli_query($dbc, $query) or die(mysqli_error($dbc));
        $query = "DELETE FROM os_usercart WHERE userId = '' OR productId = '' OR quantity = ''";
        mysqli_query($dbc, $query) or die(mysqli_error($dbc));
        echo "Successfully added . . .<br>Redirecting . . .<script>window.location.href='/myaccount/mycart'</script>";
    }
    else
    {
        header("Location: ./");
    }
        include("../../common/footer.php");

?>
