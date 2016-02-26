<?php 
$pt = 'Zero Stock | Products | Admin';
$adminmenu = TRUE;
$pp = "../../../";
include("../../../common/header.php"); 
if(!isset($_SESSION['os_cur_user']))
    echo "<script>$('#btnLogin').click();</script>";
echo "<span class='list-head'>Goto <a href='../update' style='color: #040'>Update Stock</a> to change the availability of the stocks.</span>";
include("../../../common/config.php");
$query = "SELECT Id, Name, Stock FROM os_products WHERE Stock = 0";
$result = mysqli_query($dbc, $query) or die(mysqli_error($dbc));
echo "<table width='675' style='margin: 20px 0px'>".
        "<tr>".
            "<td class='table-h'>Product</td>".
        "</tr>";
$c = 0;
while($row=mysqli_fetch_row($result))
{
    echo "<tr>".
            "<td class='table-d' width='500'>".
                "<a href='../update?id=".$row[0]."'>".
                    "<div id='lister' style='padding: 10px; border-radius: 5px'>"
                        .$row[1]."<span style='color: #448; float: right'>(ID:".$row[0].")</span>".
                    "</div>".
                "</a>".
            "</td>";
         "</tr>";
    $c += 1;
}
if($c == 0) echo "<tr><td><div style='padding: 50px; text-align: center'>None: No product is at zero</div></td></tr>";
echo "</table>";
echo "<span class='list-head'>Products soon going to be out of stock</span>".
     "<input type='text' id='limit' class='txt' style='width: 50px; margin-left: 50px' maxlength='3' value='1'>".
     "<button id='limitSubmit' class='btn'>Go</button>";
echo "<div id='table-holder'></div>";
?>
<script>
    $(document).ready(function (e) { $("#limitSubmit").click(); });
    $("#limitSubmit").click(function (e) {
        $.ajax({
            url: "limit.php",
            data: { "limit": $("#limit").val() },
            beforeSend: function (e) {
                temp = "<div style='background-image: url(/images/loader.gif); background-repeat: no-repeat; "
                temp += "background-position: center; height: 100px'></div>";
                $("#table-holder").html(temp);
            },
            success: function (e) {
                $("#table-holder").html(e);
            }
        });
    });
    $("#lister").hover(function (e) { $(this).css("background-color","#eee"); }, function (e) { $(this).css("background-color","transparent"); });
</script>
<?php
include("../../../common/footer.php"); 
?>