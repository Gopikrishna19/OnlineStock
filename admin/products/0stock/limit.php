<?php
include("../../../common/config.php");
$query = "SELECT Id, Name, Stock FROM os_products WHERE Stock <= ".$_REQUEST['limit']." AND Stock != 0";
$result = mysqli_query($dbc, $query) or die(mysqli_error($dbc));
echo "<table width='675' style='margin: 20px 0px'>".
        "<tr>".
            "<td class='table-h' width='500'>Product</td>".
            "<td class='table-h'>Stock</td>".
        "</tr>";
while($row=mysqli_fetch_row($result))
{
    echo "<tr>".
            "<td class='table-d' width='500'>".$row[1]."<br><span style='color: #448;'>(ID:".$row[0].")</span></td>".
            "<td class='table-d'>".$row[2]."</td>".
         "</tr>";
}
echo "</table>";
?>