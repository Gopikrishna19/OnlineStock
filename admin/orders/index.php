<?php
    $adminmenu = TRUE;
    $pt = 'Orders | Admin';
    include("../../common/header.php");
    if(!isset($_SESSION['os_cur_user']))
        echo "<script>$('#btnLogin').click();</script>";
    include("../../common/config.php");
    $query = "SELECT os_orders.*, os_users.dName, os_products.Name FROM os_orders, os_users, os_products ".
             "WHERE os_users.uName = os_orders.userId AND os_orders.productId = os_products.Id AND NOT( status = 'D' OR status = 'R')";
    echo "<table width='675px' style='font-size: 12px'>".
            "<tr>".
                "<td class='table-h' width='200px'>Product</td>".
                "<td class='table-h' width='200px'>By</td>".
                "<td class='table-h' width='50px'>Qty</td>".
                "<td class='table-h' width='50px'>Price</td>".
                "<td class='table-h' width='50px'>Mode</td>".
                "<td class='table-h' width='125px'>Status</td>".
            "</tr>";
    $result = mysqli_query($dbc,$query) or die(mysqli_error($dbc));
    while($row = mysqli_fetch_row($result))
    {
        if($row[6]=="O") $status = "Order Placed";
        elseif($row[6]=="U") $status = "Unavailable";
        elseif($row[6]=="S") $status = "Shipped";
        elseif($row[6]=="D") $status = "Delivered";
        elseif($row[6]=="R") $status = "Returned";
        echo "<tr>".
                "<td class='table-d' >".$row[9]."<br><span style='color: #448;'>(ID:".$row[1].")</span></td>".
                "<td class='table-d' >".$row[8]."<br>(<span style='color: #448;' >".$row[2]."</span>)</td>".
                "<td class='table-d' >".$row[5]."</td>".
                "<td class='table-d' >".$row[4]."</td>".
                "<td class='table-d' >".$row[7]."</td>".
                "<td class='table-d' >".$status."<br>".
                    "<span style='color: #44D' class='item-change' data-item-id='".$row[0]."'>Change</span>".
                "</td>".
             "</tr>";
    }
    echo "</table>";
?>
<span style="font-style: italic; font-size: 12px">Mode <b>MP</b>: through MakePayment, <b>CD</b>: Cash On Delivery</span>
<div id="div-alert" style="display: none"></div>
<script>
    $(".item-change").click(function (e) {
        var a = $(this);
        res = prompt("Enter a value to change the status\nO: Order Placed\nU: Unavailable\nS: Shipped\nD: Delivered\nR: Returned\n");
        if (res != null)
            setTimeout(function () {
                if (res != 'U' && res != 'S' && res != 'O' && res != 'D' && res != 'R' &&
               res != 'u' && res != 's' && res != 'o' && res != 'd' && res != 'r') {
                    alert("That is not an correct option.\nUse the option from that are only listed.");
                }
                else {
                    var order = a.attr("data-item-id");
                    $.ajax({
                        url: "status.php",
                        data: { "order": order, "status": res },
                        success: function (e) {
                            $("#div-alert").html(e);
                            $("#div-alert").slideToggle();
                            setTimeout(function () { $("#div-alert").slideToggle() }, 5000);
                        }
                    });
                }
            }, 1000);
    });
</script>
<?php
    include("../../common/footer.php");
?> 