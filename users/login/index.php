<?php 
$pp="../../";
$pt = 'Log In | User';
$nocpanel=true;
include('../../common/header.php'); ?>
<table id="table-login">
  <tr>
    <td>e-Mail</td>
    <td>:</td>
    <td><input type="text" name="username" id="uname" class="txt"></td>
  </tr>
  <tr>
    <td>Password</td>
    <td>:</td>
    <td><input type="password" name="password" id="upass" class="txt"></td>
  </tr>
  <tr>
    <td colspan="2"></td>
    <td><button name="btnLogin" id="btnLogin" class="btn" type="submit">Log In</button>
      <button id="btnCancel" class="btn">Cancel</button>
      <a id="btnRegister" href="/users/register">Register</a></td>
  </tr>
</table>
<div id="div-error"></div>
<script>
$(document).ready(function(e) {
	$("#div-error").hide();
	$("#btnCancel").click(function(e) {
		document.location.href = "<?php echo isset($_POST['red_uri'])?$_POST['red_uri']:"/"; ?>";
	});
	$("#btnLogin").click(function(e) {
		if($("#uname").val() && $("#upass").val())
		$.ajax({ 
			url : "login.php",
			data : { 
				"uname" : $("#uname").attr("value"),
				"upass" : $("#upass").attr("value"),
				"red_uri" : "<?php echo isset($_POST['red_uri'])?$_POST['red_uri']:"/"; ?>" },
			success: function(t) {
				$("#div-error").html(t);
				$("#div-error").slideToggle();
				setTimeout(function(){$("#div-error").slideToggle()},5000);
			}});
    });
});
</script>
<?php include("../../common/footer.php");?>