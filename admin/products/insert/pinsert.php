<?php
if(!isset($_REQUEST['btnInsert'])) {
    header("Location: ./");
    exit;
}
?>
<?php
if(isset($_REQUEST['btnInsert']))
{
    require("../../../common/config.php");
	$pName = mysqli_real_escape_string($dbc,$_REQUEST['pName']);
    $pCat = $_REQUEST['pCat'];
	$pDesc = mysqli_real_escape_string($dbc,$_REQUEST['pDesc']);
	$pSpec = mysqli_real_escape_string($dbc,$_REQUEST['pSpec']);
	$pStock = $_REQUEST['pStock'];
	$pPrice = $_REQUEST['pPrice'];
	$pDiscount = $_REQUEST['pDiscount'];
	$pDelivery = $_REQUEST['pDelivery'];
	$query = "SELECT count(*) FROM os_products";
	$result = mysqli_query($dbc, $query) or die(mysqli_error($dbc));
	$row = mysqli_fetch_row($result);
	$id = 'p_';
	$idno = $row[0];
	$idlen = 6 - strlen((string) $idno);
	for($i=0;$i<$idlen;$i++)
	{
		$id = $id."0";
	}
	$id = $id.$idno;
		$pImage = 'default.png';
	if(isset($_REQUEST['pImage']))
	{
		$pImage = $id.".".pathinfo("../../../images/uploaded/temp/".$_REQUEST['pImage'],PATHINFO_EXTENSION);
		copy("../../../images/uploaded/temp/".$_REQUEST['pImage'], 
		 	 "../../../images/uploaded/".$pImage);
		$files = glob("../../../images/uploaded/temp/*",GLOB_MARK);
		foreach ($files as $file) {
			unlink($file);
		}
	}
	$query = 	"INSERT INTO os_products VALUES('".$id."','".$pName."','".$pCat."','".$pDesc."','".
				$pSpec."','".$pImage."',".$pStock.",CURRENT_TIMESTAMP,".$pPrice.",".$pDiscount.",".$pDelivery.",1)";
	$result = mysqli_query($dbc,$query) or die(mysqli_error($dbc));
	$query = 	"INSERT INTO os_sold VALUES('".$id."',0)";
	$result = mysqli_query($dbc,$query) or die(mysqli_error($dbc));
	$query = 	"INSERT INTO os_visited VALUES('".$id."',0)";
	$result = mysqli_query($dbc,$query) or die(mysqli_error($dbc));
	header("Location : success");
    exit;
}
?>