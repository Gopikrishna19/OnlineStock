<?php
function calRate($id){
    include("config.php");
    $query = "SELECT sum(rating), count(rating) FROM os_comments WHERE productId = '".$id."'";
    $result = mysqli_query($dbc,$query) or die(mysqli_error($dbc));
    $row = mysqli_fetch_row($result);
    if($row[0]==null) echo "<span style='color: #000; text-shadow: 1px 1px 1px #FFF; font-size: 16px'><b>UnRated</b></span>";
    else echo  "<span style='color: #000; text-shadow: 1px 1px 1px #FFF; font-size: 16px'><b> &nbsp; ".
               round((doubleval($row[0])/doubleval($row[1])),2).
               "&nbsp; </b></span> by <span style='color: #000; text-shadow: 1px 1px 1px #FFF; font-size: 16px'><b>&nbsp; ".
               $row[1]." &nbsp; </b></span> Customers";
}
?>