<?php 
$pp = "";
$pt = 'Home';
include("common/header.php"); ?>
<h2>New Products</h2>
<hr>
<?php
	include("common/get-products.php"); 
	getProductIcons(5," WHERE Available = 1 ORDER BY os_products.Date DESC ",TRUE);
    echo "<p><br></p><hr class='split'><p><br></p><h2>Special Offers</h2><hr>";
    getProductIcons(5," WHERE Discount > 0 AND Available = 1 ORDER BY os_products.Discount DESC ",TRUE);
    echo "<p><br></p><hr class='split'><p><br></p><h2>Top Sales</h2><hr>";
    getProductIcons(5,", os_sold WHERE os_sold.productId = Id AND Available = 1 AND os_sold.quantity > 0 ORDER BY os_sold.quantity DESC ");
    echo "<p><br></p><hr class='split'><p><br></p><h2>Top Visits</h2><hr>";
    getProductIcons(5,", os_visited WHERE os_visited.productId = Id AND os_visited.count > 0 AND Available = 1 ORDER BY os_visited.count DESC ");
?>
<?php include("common/footer.php"); ?>