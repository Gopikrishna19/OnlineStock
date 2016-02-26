<?php 
if(!isset($_REQUEST['id'])) header("Location: ../");
$pt = 'Product Details';
$pp = "../";
include("../common/header.php");
include("../common/get-products.php");
getDetails($_REQUEST['id']);
echo "<br><hr class='split'><br>";
include("../common/comment.php");
include("../common/footer.php"); ?>