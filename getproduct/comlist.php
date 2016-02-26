<?php
    include("../common/config.php");
    $query = "SELECT * FROM os_comments WHERE productId = '".$_REQUEST['id']."' ORDER BY date DESC";
    $result = mysqli_query($dbc, $query) or die(mysqli_error($dbc));
    echo "";
    while($row = mysqli_fetch_row($result))
    {
        $date = split(" ",$row[4]);
        $date = $date[0];
?>
<div style="margin: 25px 0px">
    <div style="background-color: #CCC; border-radius: 10px 10px 0px 0px; border-bottom: 1px #ff6a00 solid; padding: 10px;">
        <span style="color: #300; font-size: 12px;">Commented by : </span>
        <span style="color: #448;"><?php echo $row[3]; ?></span>
        <span style="color: #300; font-size: 12px;">on</span>
        <span style=""><?php echo $date; ?></span>
    </div>
    <div style="background-color: #EEE; border-radius: 0px 0px 10px 10px; padding: 20px 10px; text-indent: 25px; line-height: 20px; font-size: 14px">
        <?php echo $row[5]; ?>
    </div>
</div>
<?php } ?>