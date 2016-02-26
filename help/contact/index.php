<?php 
$pt = "Contact Us | Help";
$pp = "../../";
$user = "Guest";
$helpmenu = TRUE;
include("../../common/header.php");
if(isset($_SESSION['os_cur_user'])) $user = $_SESSION['os_cur_user'];
echo "<span class='list-head'>Write your Query or Suggestion here!</span>";
?>
<form action="contact.php" method="post">
    <input type="hidden" name="uname" value="<?php echo $user; ?>">
    <fieldset>
        <legend>Contact Form</legend>
        <table>
            <tr><td>As</td><td>:</td><td><?php echo $user; ?></td></tr>
            <tr><td>On</td><td>:</td><td><?php echo date("d-m-Y");?></td></tr>
            <tr><td colspan="3"><textarea class="txt" style="width: 500px" rows="15" required name="content"></textarea></td></tr>
            <tr><td colspan="3"><input type="submit" value="Submit" class="btn" name="btnSubmit"></td></tr>
        </table>
    </fieldset>
</form>
<?php
include("../../common/footer.php");
?>