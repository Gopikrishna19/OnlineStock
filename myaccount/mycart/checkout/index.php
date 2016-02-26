<?php
    $usermenu=TRUE;
    $pt = 'Check Out | My Cart | My Account';
    include('../../../common/header.php');
    if(!isset($_REQUEST['am']) || !isset($_SESSION['os_cur_user']))
        header("Location: ../");
?>
<table width="100%">
    <tr>
        <td>Amount to pay</td>
        <td>:</td>
        <td><span class="rupee"> &nbsp; &nbsp; </span><?php echo base64_decode($_REQUEST['am']); ?> /-</td>
    </tr>
    <tr>
        <td>To be paid by</td>
        <td>:</td>
        <td><?php echo base64_decode($_REQUEST['ud'])." <span style='color: #448;'>[ ID: ".base64_decode($_REQUEST['un'])." ]</span> "; ?></td>
    </tr>
</table>
<p><br></p>
<hr class="split">
<p><br></p>
<fieldset>
    <legend>Select a method</legend>
<form method="post" action="cod.php" style="clear: left">
    <input name="un" value="<?php echo $_REQUEST['un']; ?>" type="hidden">
    <input name="ud" value="<?php echo $_REQUEST['ud']; ?>" type="hidden">
    <input name="am" value="<?php echo $_REQUEST['am']; ?>" type="hidden">
    <input type="radio" value="0" name="method" checked>Cash On Delivery<br>
    <input type="radio" value="1" name="method">Through MakePayment<br>
    &nbsp;<input type="submit" class="btn" value="Check Out &raquo;" style="background-color: #484">
</form>
</fieldset>
<?php
    include('../../../common/footer.php');
?>