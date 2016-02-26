<?php
    $usermenu = TRUE;
    $pt = 'My Orders | My Account';
    include("../../common/header.php");
    if(!isset($_SESSION['os_cur_user']))
        echo "<script>$('#btnLogin').click();</script>";
    echo "<button id='btnClean' blue style='float: right' class='btn' title='Removes Returned Items\nCannot be undone!'>Clean List</button>";
    include("../../common/config.php");
    $query = "SELECT os_orders.*, os_products.Name FROM os_orders, os_products ".
             "WHERE userId = '".$_SESSION['os_cur_user']."' AND productId = os_products.Id AND status != 'D'";
    $result = mysqli_query($dbc, $query) or die(mysqli_error($dbc));
    $status = "";
    echo "<table width='675px'><tr><td class='table-h' width='270px'>Product</td><td class='table-h' width='135px'>Date</td>".
         "<td class='table-h' width='135px'>Quantity</td><td class='table-h' width='135px'>Status</td></tr>";
    while($row = mysqli_fetch_row($result))
    {
        if($row[6]=="O") $status = "Order Placed";
        elseif($row[6]=="U") $status = "Unavailable";
        elseif($row[6]=="S") $status = "Shipped";
        elseif($row[6]=="R") $status = "Returned";
        echo "<tr><td class='table-d'>".$row[8]." <span style='color: #448;'>(ID:".$row[1].")</span></td><td class='table-d'>".$row[3].
             "</td><td class='table-d'>".$row[5]."</td><td class='table-d'>".$status."</td></tr>";
    }
    echo "</table>";
    ?>
<div id="ajax-result"></div>
<script>
    $("#btnClean").click(function (e) {
        $.ajax({
            url: "clean.php",
            success: function (e) {
                $("#ajax-result").html(e);
            }
        });
    });
</script>
    <?php
    include("../../common/footer.php");
?>