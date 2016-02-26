<?php
include("../../common/header.php"); 
if(isset($_REQUEST['submit']))
{
    $amount = base64_decode($_REQUEST['am']);
    $uname = base64_decode($_REQUEST['un']);
    $dname = base64_decode($_REQUEST['ud']);
?>
<table width="100%">
    <tr>
        <td>Amount made for</td>
        <td>:</td>
        <td><b>Online Stock Trading Center</b></td>
    </tr>
    <tr>
        <td>Amount to pay</td>
        <td>:</td>
        <td><span class="rupee"> &nbsp; &nbsp; </span><?php echo $amount; ?> /-</td>
    </tr>
    <tr>
        <td>To be paid by</td>
        <td>:</td>
        <td><?php echo $dname." <span style='color: #448;'>[ ID: ".$uname." ]</span> "; ?></td>
    </tr>
</table>
<hr style="margin: 25px 0px">
<?php
    $statusCode=0;
    $cond='';
    include("../../common/config.php");
    switch($_REQUEST['cat'])
    {
        case "bank": $cond = " AND accno = '".$_REQUEST['accno']."'"; break;
        case "credvisa": 
        case "debvisa": $cond = " AND cardno = '".$_REQUEST['cnumber']."'"; break;
        case "credamex":
        case "debmaes": 
        case "debmast": 
        case "mdone": $cond = " AND cardno = '".$_REQUEST['cnumber']."' AND code = '".$_REQUEST['ccode']."'"; break;
        case "mmobi": $cond = " AND mobile = '".$_REQUEST['cnumber']."'"; break;
    }
    $query = "SELECT amount FROM os_cards WHERE method = '".$_REQUEST['cat']."' ".$cond;
    $result = mysqli_query($dbc, $query) or die(mysqli_error($dbc));
    if($row = mysqli_fetch_row($result))
    {
        if($row[0] < $amount) $statusCode=2;
        else
        {
            $query = "UPDATE os_cards SET amount = amount - ".intval($amount)." WHERE method = '".$_REQUEST['cat']."'";
            mysqli_query($dbc, $query) or die(mysqli_error($dbc));
        }
    }
    else {
        $statusCode=1;
    }
    if($statusCode == 0)
    {
        $query = "SELECT userId, productId, quantity, ROUND((os_products.Price * (1 - os_products.Discount / 100) * quantity), 2) as amount ".
                "FROM os_usercart, os_products WHERE userId = '".$uname."' AND os_products.Id = productId";
        $result = mysqli_query($dbc, $query) or die(mysqli_error($dbc));
        while($row = mysqli_fetch_row($result))
        {
            $orderId = sha1($row[1].$row[0].date("d-m-Y"));
            $query = "INSERT INTO os_orders VALUES('".$orderId."','".$row[1]."','".$row[0]."',CURRENT_TIMESTAMP,".$row[3].",".$row[2].",'O','MP')";
            mysqli_query($dbc,$query) or die(mysqli_error($dbc));
            $query = "UPDATE os_sold SET quantity = quantity + ".intval($row[2])." WHERE productId = '".$row[1]."'";
            mysqli_query($dbc,$query) or die(mysqli_error($dbc));
            $query = "UPDATE os_products SET Stock = Stock - ".intval($row[2])." WHERE Id = '".$row[1]."'";
            mysqli_query($dbc,$query) or die(mysqli_error($dbc));
            $query = "DELETE FROM os_usercart WHERE userId = '".$row[0]."'";
            mysqli_query($dbc,$query) or die(mysqli_error($dbc));
        }
    }
    ?>
<div style="height: 150px; width: 150px; background-image: url(/images/Loader.gif); margin: auto; background-size: contain"></div>
<div style="font-weight: bold; text-align: center" id="status"></div>
<script>
    $("#status").ready(function(e) { $("#status").html("Getting ready ..."); setTimeout(function(){st1()}, 2000); });
    function st1() { $("#status").html("Connecting to Service ..."); setTimeout(function(){st2()}, 2000); }
    function st2() { $("#status").html("Checking Credentials ..."); setTimeout(function(){st3()}, 3000); }
    function st3() { $("#status").html("Making Payments ..."); setTimeout(function(){st4()}, 4000); }
    function st4() { $("#status").html("Finishing ..."); setTimeout(function(){st5()}, 2000); }
    function st5() { window.location.href = "http://onlinestock.com/myaccount/mycart/status?status=<?php echo $statusCode; ?>"; }
</script>
<?php
}
else
    header('Location: ../');
include("../../common/footer.php"); 
?>