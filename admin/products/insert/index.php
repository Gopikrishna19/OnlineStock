<?php 
$pt = 'Insert New Product | Products | Admin';
$adminmenu = TRUE;
$pp = "../../../";
include("../../../common/header.php"); 
if(!isset($_SESSION['os_cur_user']))
    echo "<script>$('#btnLogin').click();</script>";
?>

<form action="pinsert.php" method="post">
  <table>
    <tr>
      <td><label for="pName">Product Name</label></td>
      <td>: <span style="color: #F00">*</span></td>
      <td><input type="text" class="txt" name="pName" required></td>
    </tr>
    <tr>
      <td><label for="pCat">Category</label></td>
      <td>: <span style="color: #F00">*</span></td>
      <td><select name="pCat" class="txt" style="width: 265px">
          <?php include_once("../../../common/category.php"); getCategoryOption(); ?>
        </select></td>
    </tr>
    <tr valign="top">
      <td><label for="pDesc">Short<br>Description</label></td>
      <td>:</td>
      <td><textarea name="pDesc" rows="10" cols="50"></textarea></td>
    </tr>
    <tr valign="top">
      <td><label for="pSpec">Long Description/<br>Specifications</label></td>
      <td>:</td>
      <td><textarea name="pSpec" rows="10" cols="50"></textarea></td>
    </tr>
    <tr valign="top">
      <td><label for="pImage">Image</label></td>
      <td>:</td>
      <td><input type="file" name="file" id="fileImage" class="btn" style="padding: 5px; width: 250px">
      <div id="output"></div>
      </td>
    </tr>
    <tr>
      <td><label for="pStock">Stock</label></td>
      <td>: <span style="color: #F00">*</span></td>
      <td><input type="number" class="txt" name="pStock" required min="1" value="1"></td>
    </tr>
    <tr>
      <td><label for="pPrice">Original Price</label></td>
      <td>: <span style="color: #F00">*</span><span class="rupee">&nbsp; &nbsp; &nbsp;</span></td>
      <td><input type="number" class="txt" name="pPrice" required min="0.0" value="0" step="0.01"></td>
    </tr>
    <tr>
      <td><label for="pDiscount">Discount</label></td>
      <td>: <span style="color: #F00">*</span> %</td>
      <td><input type="number" class="txt" name="pDiscount" required value="0"></td>
    </tr>
    <tr>
      <td><label for="pDelivery">Delivery In</label></td>
      <td>: <span style="color: #F00">*</span></td>
      <td><input type="number" class="txt" name="pDelivery" required value="1" min="1"> Business days (approx.)</td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td><input type="submit" name="btnInsert" value="Submit"> &nbsp; <a href="/admin">Cancel</a></td>
    </tr>
  </table>
</form>
<script>
$("#fileImage").change(function(e) {
	var fd = new FormData();
    fd.append( "file", $("#fileImage")[0].files[0]);
    $.ajax({
		url:"upload.php",
		type: 'POST',
                cache: false,
                data: fd,
                processData: false,
                contentType: false,
                beforeSend: function () {
                    $("#output").html("Uploading, please wait....");
                },
                success: function (e) { 
                    $("#output").html(e);
                }
	});
});
</script>
<?php include("../../../common/footer.php"); ?>