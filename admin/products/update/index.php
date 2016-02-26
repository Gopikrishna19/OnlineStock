<?php 
$pt = 'Update Stock | Products | Admin';
$adminmenu = TRUE;
$pp = "../../../";
include("../../../common/header.php"); 
if(!isset($_SESSION['os_cur_user']))
    echo "<script>$('#btnLogin').click();</script>";
echo "<select style='width: 675px' id='product' class='txt'>";
echo "<option>Select a Product</option>";
include("../../../common/config.php");
$query = "SELECT Id, Name, Stock FROM os_products";
$result = mysqli_query($dbc, $query) or die(mysqli_error($dbc));
while($row = mysqli_fetch_row($result))
{
    echo "<option value='".$row[0]."'>".$row[0]." : ".$row[1]."</option>";
}
echo "</select>";
?>
<iframe src="getdet.php" width="675px" name="ifDet" seamless height="450px" id="ifDet"></iframe>
<?php 
if(isset($_REQUEST['id'])) { echo "<script>$(document).ready(function (e) { getDet('".$_REQUEST['id']."'); });</script>"; }
?>
</div>
<script>
    $(document).ready(function (e) {
        $("#product").change(function (e) {
            getDet($("#product").val());
        });
    });
    function getDet(id) {
        if (id != 0) {
            temp = "<div style='background-image: url(/images/loader.gif); background-repeat: no-repeat; "
            temp += "background-position: center; height: 100px'></div>";
            $("#ifDet").html(temp);
            document.getElementById("ifDet").src = "getdet.php?id=" + id;
        }
    }
</script>
<?php
include("../../../common/footer.php"); 
?>