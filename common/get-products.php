<?php
function getProducts($Limit = 5, $cat = '', $pp = '', $cond = '') {
	include("config.php");
	$condition = $cat == ''?$cat:$cat == 'cat_all'?"WHERE 1 ":"WHERE Category = '$cat'";
    $condition.= $cond == ''?$cond:" AND Name COLLATE UTF8_GENERAL_CI LIKE '%".$cond."%'";
	$lm = $Limit == 0?"":"LIMIT 0, ".$Limit;
	$query = "SELECT * FROM os_products ".$condition." ORDER BY os_products.Date DESC, Available DESC".$lm;
	$result = mysqli_query($dbc, $query) or die(mysqli_error($dbc));
    $foundRow = FALSE;
	while($row = mysqli_fetch_row($result))
	{
		$discount = '';
		$price = $row[8];
		if($row[6] > 0) $stock = 'In Stock';
		if($row[9] > 0) {
			$discount = "&nbsp;<span style='color: #F44; text-decoration: line-through;'>".$price."</span>";
			$price = $row[8] - ($row[9] * $row[8] / 100);
		}
		?>

		<a href="<?php echo $pp; ?>getproduct?id=<?php echo $row[0]; ?>">
		<div  class="div-list">
		  <div style="background-image: url(/images/uploaded/<?php echo $row[5]; ?>); background-size: contain;
						background-repeat: no-repeat; background-position: center; width: 100px; height: 100px;
						float: left; clear: right; margin-top: 5px"></div>
		  <div style="height: 100px; margin-top: 10px; float: left; margin-left: 25px">
		    <span class="list-head"><?php echo $row[1]; ?></span>
		    <p style="font-size: 14px; margin-left: 25px"><?php echo substr($row[3], 0, 60)." . . ."; ?></p>
		    <p>
		      <span style="margin-left: 25px">Price : </span>
		      <span class="rupee"> &nbsp; &nbsp;</span><?php echo $discount; ?> 
		      <span style="color: #484; font-weight: bold"> &nbsp;<?php echo $price; ?></span>
		    </p>
		  </div>
		</div>
		<hr class="split">
		</a>
		<?php
        $foundRow = TRUE;
	}
    if(!$foundRow)
	{
		echo "<span class='list-head'>Sorry ! No product was not found !!</span>";
	}
}
function getDetails($id) {
	include("config.php");
    if(isset($_SESSION['os_cur_user']))
    {
        $query = "SELECT productId FROM os_usercart WHERE productId = '".$id."' AND userId = '".$_SESSION['os_cur_user']."'";
        if(mysqli_fetch_row(mysqli_query($dbc, $query)) && isset($_SESSION['os_cur_user']))
        {
            ?>
            <div style="background-color: rgba(64,128,64,0.25); padding: 10px; text-align: center; margin: -25px -25px 25px -25px; color: #484">
                This Product is already in your cart | <a href="/myaccount/mycart" class="list-head">View Cart</a></div>
            <?php
        }
    }
	$query = "SELECT * FROM os_products WHERE os_products.Id = '".$id."'";
	$result = mysqli_query($dbc, $query) or die(mysqli_error($dbc));
	if($row = mysqli_fetch_row($result))
	{
		$discount = '';
		$discounttext = '';
		$stock = '';
		$stockstatus = '';
		$price = $row[8];
		if($row[6] > 0 && $row[11] > 0) { 
			$stock = '<span style="color: #484">In Stock</span>'; 
			$stockstatus = "<form action='/myaccount/mycart/add.php' method='get'>".
                           "<input type='hidden' name='product' value='".base64_encode($row[0])."'>".
                           "<input type='submit' id='btn-buy-now' value=''>".
                           "</form>";
;
		}
		else { $stock = '<span style="color: #F44"><b>Out of Stock</b> or <b>Un Available</b></span>'; }
		if($row[9] > 0) {
			$discount = "&nbsp;<span style='color: #F44; text-decoration: line-through;'>".$price."</span>";
			$price = $row[8] - ($row[9] * $row[8] / 100);
			$discounttext = "<p>Discount : <span style='color : F44'>".$row[9]." %</span></p>";
		}
		?>
        <div style="overflow: auto">
			<div style="background-image: url(/images/uploaded/<?php echo $row[5]; ?>); background-size: contain;
				background-repeat: no-repeat; background-position: center; width: 200px; height: 200px;
				float: left; margin-top: 5px"></div>
			<div style="float: left; margin-top: 10px; margin-left: 25px; width: 400px">
			  <span class="list-head"><?php echo $row[1]; ?></span><br>
			  <p>Price : <span class="rupee"> &nbsp; &nbsp;</span><?php echo $discount; ?>
				<span style="color: #484; font-weight: bold"> &nbsp;<?php echo $price; ?></span>
              </p>
			  <?php echo $discounttext; ?>
              <div style="padding: 10px; font-size: 14px; background-color: #CCC; width: 100%; border-radius: 5px 5px 0px 0px">
                  Rating : <?php include("calrate.php"); calRate($id); ?>
              </div>
			  <div style="background-color: #DDD; padding: 10px; width: 100%; margin-top: 3px;">
				Availability : <?php echo $stock; ?>
              </div>
			  <div style="background-color: #EEE; padding: 10px; width: 100%; border-radius: 0px 0px 5px 5px; margin-top: 3px; overflow: auto">
                  <div style="float: left">
                    <p>Delivered In : <?php echo ($row[10]-1)."-".($row[10]+1)." Days"; ?></p>
                        <?php echo $stockstatus; ?>
                  </div>
                  <div style="float: left; border-left: 1px solid #BBB; padding-left: 10px; margin-left: 10px; font-size: 10px;">
                    <p>Pay via <b>MakePayment</b></p>
                    <p>With an option to pay</p>
                    <p style="font-size: 14px;"><b>Cash On Delivery</b></p>
                  </div>
              </div>
			</div>
        </div>
        <hr class="split" style="margin-top: 30px">
        <div style="position: relative; width: 100%; margin-top: 20px">
            <span class="list-head">Description</span>
            <p><?php echo $row[3]; ?></p>
            <hr class="split" style="margin-top: 30px; margin-bottom: 30px">
            <span class="list-head">Specifications</span>
            <p><?php echo $row[4]; ?></p>
        </div>
		<?php
        $query = "UPDATE os_visited SET count = count + 1 WHERE productId = '".$id."'";
        mysqli_query($dbc, $query) or die(mysqli_error($dbc));
	}
	else
	{
		echo "<span class='list-head'>Sorry ! Your product ".$id." was not found !!</span>";
	}
}
function getProductIcons($Limit = 5, $condition = '', $pp = FALSE)
{
	include("config.php");
	$lm = $Limit == 0?"":"LIMIT 0, ".$Limit;
	$query = "SELECT * FROM os_products ".$condition.$lm;
	$result = mysqli_query($dbc, $query) or die(mysqli_error($dbc));
    echo "<div style='overflow: auto'>";
	while($row = mysqli_fetch_row($result))
	{
		$discount = '';
		$price = $row[8];
		if($row[6] > 0) $stock = 'In Stock';
		if($row[9] > 0) {
			$discount = "&nbsp;<span style='color: #F44; text-decoration: line-through;'>".$price."</span>";
			$price = $row[8] - ($row[9] * $row[8] / 100);
		}
		?>

	<a href="/getproduct?id=<?php echo $row[0]; ?>">
	  <div style="float: left; max-width: 13%;" class="div-list">
        <?php if($pp && $row[9] > 0) echo "<div class='offer'>".$row[9]."%</div>"; ?>
	    <div style="background-image: url(/images/uploaded/<?php echo $row[5]; ?>); background-size: contain;
      				background-repeat: no-repeat; background-position: center; width: 100px; margin: auto; height: 100px"></div>
	    <div style="padding: 5px; width: 100%; text-align: center; font-size: 12px"><?php echo $row[1]; ?></div>
	  </div>
	</a>
	<?php
	}
    echo "</div>";
}
?>
