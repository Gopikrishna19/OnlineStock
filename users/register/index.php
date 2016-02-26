<?php 
$pp = "../../";
$pt = 'Registration | User';
$nocpanel=true;
include('../../common/header.php'); ?>
<form id="formReg" method="post" action="success/" autocomplete="off">
<table id="register">
  <tr>
    <td>Display Name</td>
    <td>:</td>
    <td><input type="text" name="dname" id="dname" class="txt" required></td>
  </tr>
  <tr>
    <td>e-Mail</td>
    <td>:</td>
    <td><input type="email" name="uname" id="uname" class="txt" required><br>
        <div id="checkuser"></div>
    </td>
  </tr>
  <tr>
    <td>Password</td>
    <td>:</td>
    <td><input type="password" name="upass" id="upass" class="txt" required>
    </td>
  </tr>
  <tr>
    <td>Confirm</td>
    <td>:</td>
    <td><input type="password" name="cpass" id="cpass" class="txt" required>
        <div id="checkpass"></div>
    </td>
  </tr>
  <tr>
    <td colspan="2"></td>
    <td><input type="submit" name="btnRegister" id="btnRegister" class="btn" value="Register">
      <button id="btnCancel" class="btn">Cancel</button>
      <a id="btnLogin" href="/users/login">Log In</a></td>
  </tr>
</table>
</form>
<div id="div-error"></div>
<script>
$(document).ready(function(e) {
    $("#div-error").hide();
    $("#btnCancel").click(function(e) {
        document.location.href = "/";
    });
    $("#btnLogin").click(function(e) {
        document.location.href = "/users/login";
    });
    $("#uname").keyup(function(e) {
        if($(this).attr("value") != '') {
            $.ajax({
                url: "register.php",
                data: { "checkuser": "yes", "email": $("#uname").attr("value") },
                success: function(e) {
                    $("#checkuser").html(e);
                    if(e == "<span style='color:#F00'>eMail already registered</span>")
                        $("#btnRegister").attr("disabled", "disabled");
                    else
                        $("#btnRegister").removeAttr("disabled");
                }
            });
        }
        else {
            $("#checkuser").html("");
        }
    });
    $("#cpass").keyup(function(e) {
        if($("#cpass").val() != $("#upass").val()) {
            $("#checkpass").html("<span style='color: #f00'>Password do not match</span>");
            $("#btnRegister").attr("disabled", "disabled");
        }
        else {
            $("#checkpass").html("");
            $("#btnRegister").removeAttr("disabled");
        }
    });
});
</script>
<?php include("../../common/footer.php");?>