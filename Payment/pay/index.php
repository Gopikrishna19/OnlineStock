<?php 
include("../common/header.php"); 
?>
<form action="http://onlinestock.com/myaccount/mycart/status" style="float: right; margin-bottom: -30px">
    <input type="hidden" value="3" name="status">
    <input type="submit" class="btn" value="Cancel">
</form>
<?php
if(isset($_REQUEST['am']) && isset($_REQUEST['un']) && isset($_REQUEST['ud']))
{
    $amount = base64_decode($_REQUEST['am']);
    $uname = base64_decode($_REQUEST['un']);
    $dname = base64_decode($_REQUEST['ud']);
?>
<table width="100%">
    <tr>
        <td>Amount made for</td>
        <td>:</td>
        <td><b>Online Stock Trading Center</b></td>
    </tr>
    <tr>
        <td>Amount to pay</td>
        <td>:</td>
        <td><span class="rupee"> &nbsp; &nbsp; </span><?php echo $amount; ?> /-</td>
    </tr>
    <tr>
        <td>To be paid by</td>
        <td>:</td>
        <td><?php echo $dname." <span style='color: #448;'>[ ID: ".$uname." ]</span> "; ?></td>
    </tr>
</table>
<hr style="margin: 25px 0px">
<div id="pay">
    <div class="section" id="method">
        <div class="sec-btn" id="ccard">Credit Cards</div>
        <div class="sec-btn" id="dcard">Debit Cards</div>
        <div class="sec-btn" id="banks">Bank Transfers</div>
        <div class="sec-btn" id="mcard">Mobile/Cash Cards</div>
    </div>
    <div class="section" id="method-type">
    </div>
    <div class="section" id="method-det"></div>
</div>
<script>
    $(".sec-btn").click(function(e) {
        $(".sec-btn").removeClass("sec-btn-foc");
        $(this).addClass("sec-btn-foc");
        $("#method-det").html("");
        $("#method-type").html("");
        var id = $(this).attr("id");
        var u = "";
        switch(id) {
            case "ccard": u = "ccards"; break;
            case "dcard": u = "dcards"; break;
            case "banks": u = "banks"; break;
            case "mcard": u = "mcards"; break;
        }
        $.ajax({
            url: "lists/" + u + ".php",
            data: { "ud":"<?php echo $dname ?>", "un":"<?php echo $uname ?>", "am": "<?php echo $amount ?>" },
            success: function(e) { $("#method-type").html(e) }
        });
    });
</script>
<?php
}
else
    header('Location: ../');
include("../common/footer.php"); 
?>