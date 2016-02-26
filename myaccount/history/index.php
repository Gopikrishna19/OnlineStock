<?php
    $usermenu = TRUE;
    $pt = 'Purchase History | My Account';
    include("../../common/header.php");
    if(!isset($_SESSION['os_cur_user']))
        echo "<script>$('#btnLogin').click();</script>";
    include("../../common/config.php");
    $query = "SELECT os_orders.*, os_products.Name FROM os_orders, os_products ".
             "WHERE userId = '".$_SESSION['os_cur_user']."' AND productId = os_products.Id";
    $result = mysqli_query($dbc, $query) or die(mysqli_error($dbc));
    echo "<table width='675px'><tr><td class='table-h' width='270px'>Product</td><td class='table-h' width='135px'>Purchased On</td>".
         "<td class='table-h' width='135px'>Quantity</td><td class='table-h' width='135px'>Price</td></tr>";
    while($row = mysqli_fetch_row($result))
    {
        echo "<tr><td class='table-d'>".$row[8]." <span style='color: #448;'>(ID:".$row[1].")</span></td><td class='table-d'>".$row[3].
             "</td><td class='table-d'>".$row[5]."</td><td class='table-d'>".$row[4]."</td></tr>";
    }
    echo "</table>";
    include("../../common/footer.php");
?>