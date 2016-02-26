<?php 
$pt = 'Comments | Inbox | Admin';
$adminmenu = TRUE;
$pp = "../../../";
include("../../../common/header.php"); 
if(!isset($_SESSION['os_cur_user']))
    echo "<script>$('#btnLogin').click();</script>";
?>
<section style="text-align: right">
    <input type="button" blue value="Clear Read" id="cread" class="btn">
    <input type="button" blue value="Clear All" id="call" class="btn">
</section>
<?php
include("../../../common/config.php");
$query = "SELECT * FROM os_comments WHERE viewed = 0 ORDER BY viewed ASC, date DESC";
$result = mysqli_query($dbc, $query) or die(mysqli_error($dbc));
while($row = mysqli_fetch_row($result))
{
?>
<div class="message" style="margin: 10px 0px; border-radius: 10px; background-color: #EEE; box-shadow: 0px 0px 2px 0px #600">
    <input type="hidden" id="id" value="<?php echo $row[0]; ?>">
    <div id="title" style="border-bottom: 1px #F80 solid; border-radius: 10px; box-shadow: 0px 8px 10px -7px rgba(128,128,128,0.5);
         padding: 10px 20px; background-color: #F8F8F8; cursor: pointer" onmouseover="hover(this)" onmouseout="out(this)">
        <span style="font-size: 12px">From : </span>
        <span id="user" style="<?php echo $row[6]=='0'?'font-weight: bold':''; ?>"><?php echo $row[3]; ?></span>
    </div>
    <div id="content" style="display: none;">
        <div style="padding: 10px 25px; border-radius: 10px 10px 0px 0px; border-bottom: 1px #F80 solid;">
            <?php echo $row[5]; ?>
        </div>
        <div style="padding: 10px 25px; border-radius: 0px 0px 10px 10px; background-color: #DFDFDF; ">
            Rated: <b><?php echo $row[7]; ?></b>
        </div>    
    </div>
</div>
<div id="alert"></div>
<?php
}
?>
<script>
    function hover(e) { e.style.backgroundColor = "#888"; e.style.color = "#FFF"; }
    function out(e) { e.style.backgroundColor = "#F8F8F8"; e.style.color = "#000"; }
    $(".message").click(function (e) {
        $(".message #content").slideUp(100);
        $(this).children("#content").stop().slideToggle(100);
        $(this).find("#user").css("font-weight", "normal");
        var id = $(this).find("#id").val();
        $.ajax({ url: "view.php", data: { "id": id} });
    });
    $("#cread").click(function (e) { window.location.reload(); });
    $("#call").click(function (e) { $(".message").click(); window.location.reload(); });
</script>
<?php
include("../../../common/footer.php"); 
?>