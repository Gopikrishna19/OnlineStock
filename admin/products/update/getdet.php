<html>
    <head>
        <script src="/scripts/jquery.js" type="text/javascript"></script>
        <link href="/styles/style.css" type="text/css" rel="stylesheet">
        <script src="/scripts/checkbox.js" type="text/javascript"></script>
    </head>
<body>
<?php
include("../../../common/config.php");
if(isset($_REQUEST['id'])) {
$id = $_REQUEST['id'];
$query = "SELECT * FROM os_products WHERE Id = '".$id."'";
$result = mysqli_query($dbc, $query) or die(mysqli_error($dbc));
if($row = mysqli_fetch_row($result)) {
?>
<script>
$(document).ready(function(e) {	$("input[type=checkbox]").convertCB2Switch({"onColor":"#CC0","offColor":"#0CC"});});
</script>
<table width="100%">
    <tr>
        <td class="table-h" width="33%">Product Id</td>
        <td class="table-d" id="product-id" data-value="<?php echo $row[0]; ?>"><?php echo $row[0]; ?></td>
    </tr>
    <tr>
        <td class="table-h">Product Name</td>
        <td class="table-d"><?php echo $row[1]; ?></td>
    </tr>
    <tr>
        <td class="table-h">Price</td>
        <td class="table-d"><input type="text" id="product-price" class="txt" value="<?php echo $row[8]; ?>"></td>
    </tr>
    <tr>
        <td class="table-h">Discount</td>
        <td class="table-d"><input type="text" id="product-disc" class="txt" value="<?php echo $row[9]; ?>"></td>
    </tr>
    <tr>
        <td class="table-h">Stock</td>
        <td class="table-d"><input type="text" id="product-stock" class="txt" value="<?php echo $row[6]; ?>"></td>
    </tr>
    <tr>
        <td class="table-h">Available</td>
        <td class="table-d"><input type="checkbox" id="product-avail" <?php echo $row[11]==1?"checked":""; ?>></td>
    </tr>
    <tr>
        <td></td>
        <td class="table-d"><button id="product-update" class="btn" style="width: 264px">Update</button></td>
    </tr>
</table>
<div id="div-alert"></div>
<script>
    $("#product-update").click(function (e) {
        var a = 1;
        if (!$("#product-avail").is(":checked")) {
            a = 0;
        }
        $.ajax({
            url: "update.php",
            data: {
                "id": $("#product-id").attr("data-value"),
                "price": $("#product-price").val(),
                "disc": $("#product-disc").val(),
                "stock": $("#product-stock").val(),
                "avail": a
            },
            success: function (e) {
                $("#div-alert").html(e);
                setTimeout(function (e) { window.location.reload(); }, 3000);
            }
        });
    });
</script>
<?php  } } ?>
</body>
</html>