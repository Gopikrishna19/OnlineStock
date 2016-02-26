<?php
    $usermenu = TRUE;
    $pt = 'My Account';
    include("../common/header.php");
    if(!isset($_SESSION['os_cur_user']))
        echo "<script>$('#btnLogin').click();</script>";
    include("../common/config.php");
    $query = "SELECT * FROM os_address WHERE userId = '".$_SESSION['os_cur_user']."'";
    $a1 = ''; $a2 = ''; $st = ''; $pin = '';
    $result = mysqli_query($dbc, $query);
    if($row = mysqli_fetch_row($result))
    {
        $a1 = $row[1];
        $a2 = $row[2];
        $st = $row[3];
        $pin = $row[4];
    }
    ?>
<b>
    <table>
        <tr>
            <td><span style="color: #448;">Display Name</span></td>
            <td>:</td>
            <td><?php echo $_SESSION['os_cur_disp']; ?></td>
        </tr>
        <tr>
            <td><span style="color: #448;">User Name (eMail for login)</span></td>
            <td>:</td>
            <td><?php echo $_SESSION['os_cur_user']; ?></td>
        </tr>
    </table>
</b>
<p><br></p>
<hr class="split">
<p><br></p>
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
<p><br></p>
<hr class="split">
<p><br></p>
<fieldset>
<legend>My Address (Address to deliver shipments)</legend>
<table>
  <tr>
    <td>Address line 1</td>
    <td>:</td>
    <td><input type="text" name="addr1" class="txt" id="addr1" required value="<?php echo $a1 ?>">
    </td>
  </tr>
  <tr>
    <td>Address line 2</td>
    <td>:</td>
    <td><input type="text" name="addr2" class="txt" id="addr2" required value="<?php echo $a2 ?>">
        <div id="checkpass"></div>
    </td>
  </tr>
  <tr>
    <td>State</td>
    <td>:</td>
    <td><input type="text" name="state" class="txt" id="state" required value="<?php echo $st ?>">
        <div id="checkpass"></div>
    </td>
  </tr>
  <tr>
    <td>PIN (6-digits)</td>
    <td>:</td>
    <td><input type="text" name="pin" class="txt" id="pin" required maxlength="6" value="<?php echo $pin ?>">
        <div id="checkpass"></div>
    </td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td><input type="button" value="Update" class="btn" id="btnUpdate"></td>
  </tr>
</table>
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
    $("#btnUpdate").click(function(e) {
        $.ajax({
            url: "addr.php",
            data: { "addr1": $("#addr1").val(), "addr2": $("#addr2").val(), "state": $("#state").val(), "pin": $("#pin").val() },
            success: function(e) {
                window.location.reload();
            }
        })
    });
</script>
    <?php
    include("../common/footer.php");
?>