<?php 
if(!isset($_REQUEST['by'])) header("Location: ../");
$pt = '';
switch($_REQUEST['by'])
{
	case 'cat_book' : $pt =  "Books"; break;
	case 'cat_coac' : $pt =  "Computer & Accessories"; break;
	case 'cat_entr' : $pt =  "Entertainment"; break;
	case 'cat_game' : $pt =  "Gaming"; break;
	case 'cat_home' : $pt =  "Home & Kitchen"; break;
	case 'cat_kids' : $pt =  "Kid Zone"; break;
	case 'cat_moac' : $pt =  "Mobile & Accessories"; break;
	case 'cat_stat' : $pt =  "Stationary"; break;
	case 'cat_trav' : $pt =  "Travel"; break;
}
$pp = "../";
include("../common/header.php"); ?>
<h2><?php echo $pt; ?>
</h2>
<hr>
<?php 
include("../common/get-products.php");
getProducts(0,$_REQUEST['by'],$pp);
include("../common/footer.php"); ?>