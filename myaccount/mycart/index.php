<?php
    $usermenu = TRUE;
    $pt = 'My Cart | My Account';
    include("../../common/header.php");
    if(!isset($_SESSION['os_cur_user']))
        echo "<script>$('#btnLogin').click();</script>";
    include("../../common/config.php");
    $query = "SELECT os_products.Name, os_usercart.quantity, os_usercart.productId, os_products.Stock, ".
             "ROUND((os_products.Price - (os_products.Price * os_products.Discount / 100)), 2) as oPrice ".
             "FROM os_usercart, os_products WHERE os_products.Id = os_usercart.productId ".
             "AND os_usercart.userId = '".$_SESSION['os_cur_user']."'";
    $result = mysqli_query($dbc, $query) or die(mysqli_error($dbc));
    $cart = FALSE;
    $sum = 0.0;
    echo "<div style='overflow: auto'>";
    while($row = mysqli_fetch_row($result))
    {
        if(!$cart)
        {
        ?>
        <table width="675px">
            <tr>
                <td style="width: 55%;" class="table-h">Name</td>
                <td style="width: 20%;" class="table-h">Quantity</td>
                <td style="width: 20%;" class="table-h">Price</td>
            </tr>
        </table>
        <?php
        }
        $cart = TRUE;
        $sum += floatval($row[4]) * floatval($row[1]);        
        ?>
        <div style="border: 1px solid #FFF; border-bottom: dotted 1px #000; overflow: auto;">
         <div class="item-remove" title="Remove Item" data-item-id="<?php echo $row[2]; ?>">x</div>
         <div style="width: 55%;" class="item-list"><?php echo $row[0]." <span style='color: #448'><br>(ID:".$row[2].")</span>" ?></div>
         <div style="width: 20%; text-align: center" class="item-list"><span style="color: #600"><?php echo $row[1] ?></span> - 
            <span style="color: #44D" class="item-change" data-item-id="<?php echo $row[2]; ?>" data-item-count="<?php echo $row[1] ?>">Change</span><br>
            (x <span class="rupee"> &nbsp; &nbsp;</span><?php echo " ".floatval($row[4])." " ?><span style="color: #484">each</span>)<br>
            
         </div>
         <div style="width: 20%; text-align: right" class="item-list"><span class="rupee"> &nbsp; &nbsp;</span> <?php echo floatval($row[4]) * floatval($row[1]); ?> </div>
        </div>
        <?php
    }
    if(!$cart) { echo "<div class='list-head'>Empty Cart</div>"; }
    else
    {
        ?>
        <div style="overflow: auto">            
            <table width="675px">
                <tr>
                    <td style="width: 75%;" class="table-h">Total</td>
                    <td style="width: 20%; text-align: right" class="table-h">
                        <span class="rupee"> &nbsp; &nbsp;</span> <?php echo floor($sum); ?> &nbsp;
                    </td>
                </tr>
            </table>
        </div>
        <div id="div-alert" style="text-align: center; padding: 10px; background-color: #ffd800; display: none"></div>
        <br>
        <form method="post" action="checkout/" style="clear: left">
            <input name="un" value="<?php echo base64_encode($_SESSION['os_cur_user']); ?>" type="hidden">
	        <input name="ud" value="<?php echo base64_encode($_SESSION['os_cur_disp']); ?>" type="hidden">
            <input name="am" value="<?php echo base64_encode(floor($sum)); ?>" type="hidden">
            &nbsp;<input type="submit" class="btn" value="Check Out &raquo;" style="background-color: #484">
        </form>
        &nbsp;<button class="btn" onclick="window.location.href='/'">Continue Shopping &raquo;</button>
        <script>
            $(document).ready(function(e) {
                $(".item-remove").click(function(e) {
                    $.ajax({
                        url: "remove.php",
                        data: { "id": $(this).attr("data-item-id") },
                        error: function(e) {
                            alert("error");
                        },
                        success: function(e) {
                            window.location.reload();
                        }
                    });
                });
                $(".item-change").click(function(e) {
                    var id = $(this).attr("data-item-id");
                    var c = $(this).attr("data-item-count");
                    var d = window.prompt("New Quantity\n0 - Removes the Order", c);
                    $.ajax({
                        url: "change.php",
                        data: { "id": id, "count": d },
                        success: function(e) {
                            $("#div-alert").html(e);
                            $("#div-alert").slideToggle();
                            setTimeout(function() { $("#div-alert").slideToggle() }, 5000);
                        }
                    });
                });
            });
        </script>
        <?php
    }
    echo "</div>";
    include("../../common/footer.php");
?>