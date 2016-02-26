<?php 
$pt = "Contact Us | Help";
$pp = "../../";
include("../../common/header.php");
if(isset($_REQUEST['btnSubmit'])) {
    include("../../common/config.php");
    $id = md5($_REQUEST['uname'].date("d-m-Y").time());
    $uname = $_REQUEST['uname'];
    $content = mysqli_real_escape_string($dbc, $_REQUEST['content']);
    $query = "INSERT INTO os_inbox VALUES('".$id."','".$uname."',CURRENT_TIMESTAMP,'".$content."',0)";
    mysqli_query($dbc,$query) or die(mysqli_error($dbc));
?>
<div class="list-head">Thank You!</div>
<p>
    Your Query or Suggestion is Submitted to the OnlineStock Administrator Successfully!<br><br>
    Redirecting you to the home page in few seconds...
</p>
<?php 
 } else {
?>
<div class="list-head">Sorry!</div>
<p>
    This is an invalid access of the page!<br><br>
    Redirecting you to the home page in few seconds...
</p>
<?php }
?>
<script>
    $(document).ready(function (e) {
        setTimeout(function () { window.location.href = '/'; }, 5000);
    });
</script>
<?php
include("../../common/footer.php");
?>