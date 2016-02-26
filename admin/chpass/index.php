<?php 
$pt = 'Change Password | Admin';
$adminmenu = TRUE;
$pp = "../../";
include("../../common/header.php"); 
if(!isset($_SESSION['os_cur_user']))
    echo "<script>$('#btnLogin').click();</script>";
?>
<fieldset>
<legend>Change Password</legend>
<table>
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
    <td></td>
    <td></td>
    <td><input type="button" value="Change" class="btn" id="btnChange"></td>
  </tr>
</table>
    <div id="div-error" style="display: none"></div>
</fieldset>
<script>
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
    $("#btnChange").click(function(e) {
        $.ajax({
            url: "pass.php",
            data: { "pass": $("#upass").val() },
            success: function(e) {
                $("#div-error").html(e);
                $("#div-error").slideToggle();
                setTimeout(function() { $("#div-error").slideToggle() }, 5000);
                $("#upass").attr("value", "");
                $("#cpass").attr("value", "");
            }
        })
    });
</script>
<?php
include("../../common/footer.php"); 
?>