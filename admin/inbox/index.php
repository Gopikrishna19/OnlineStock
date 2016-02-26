<?php 
$pt = 'Inbox | Admin';
$adminmenu = TRUE;
$pp = "../../";
include("../../common/header.php"); 
if(!isset($_SESSION['os_cur_user']))
    echo "<script>$('#btnLogin').click();</script>";
?>
<section style="text-align: right">
    <input type="button" blue value="Mark All Read" id="maread" class="btn">
    <input type="button" blue value="Delete Read" id="dread" class="btn">
    <input type="button" blue value="Delete All" id="dall" class="btn">
</section>
<?php
include("../../common/config.php");
$query = "SELECT * FROM os_inbox ORDER BY  viewed ASC, date DESC";
$result = mysqli_query($dbc, $query) or die(mysqli_error($dbc));
while($row = mysqli_fetch_row($result))
{
?>
<div class="message" style="margin: 10px 0px; border-radius: 10px; background-color: transparent">
    <input type="hidden" id="id" value="<?php echo $row[0] ?>">
    <div id="title" style="border-bottom: 1px #F80 solid; border-radius: 10px; 
         padding: 10px 20px; background-color: #F8F8F8; cursor: pointer" onmouseover="hover(this)" onmouseout="out(this)">
        <span style="font-size: 12px">From : </span>
        <span id="user" style="text-shadow: 1px 1px 1px #FFF; <?php echo $row[4]=='0'?'font-weight: bold':''; ?>"><?php echo $row[1]; ?></span>
    </div>
    <div id="content" style="display: none; padding: 10px 25px; border-radius: 10px; background-color: #EEE; border: 1px #F80 solid;">
        <section style="text-align: right">
            <input type="button" green value="Mark UnRead" class="muread btn" data-id="<?php echo $row[0] ?>">
            <input type="button" green value="Delete" class="mdel btn" data-id="<?php echo $row[0] ?>">
        </section>
        <?php echo $row[3]; ?>
    </div>
</div>
<?php
}
?>
<script>
    function hover(e) { e.style.backgroundColor = "#EEE"; }
    function out(e) { e.style.backgroundColor = "#F8F8F8"; }
    $(".message").click(function (e) {
        $(".message #content").slideUp(100);
        $(this).children("#content").stop().slideToggle(100);
        $(this).find("#user").css("font-weight", "normal");
        var id = $(this).find("#id").val();
        $.ajax({ url: "handle.php", data: { "mode": "mview", "id": id} });
    });
    $("#maread").click(function (e) { $.ajax({ url: "handle.php", data: { "mode": "maread"} }); refreshWindow(); });
    $("#dread").click(function (e) { $.ajax({ url: "handle.php", data: { "mode": "dread"} }); refreshWindow(); });
    $("#dall").click(function (e) { $.ajax({ url: "handle.php", data: { "mode": "dall"} }); refreshWindow(); });
    $(".muread").click(function (e) {
        var id = $(this).parent().parent().parent().find("#id").val();
        $.ajax({ url: "handle.php", data: { "mode": "muread", "id": id} });
        refreshWindow();
    });
    $(".mdel").click(function (e) {
        var id = $(this).parent().parent().parent().find("#id").val();
        $.ajax({ url: "handle.php", data: { "mode": "mdel", "id": id} });
        refreshWindow();
    });
    function refreshWindow() { window.location.href="/admin/inbox"; }
</script>
<?php
include("../../common/footer.php"); 
?>