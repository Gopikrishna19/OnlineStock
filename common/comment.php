<?php
    echo "<input type='hidden' id='product' value='".$_REQUEST['id']."'>";
    if(isset($_SESSION['os_cur_user']))
    {
?>
<fieldset>
<legend>Comment on this Product</legend>
<p>Comment as : <?php echo $_SESSION['os_cur_user'] ?></p>
<p style="font-size: 10px">Use HTML tag <b>&lt;p&gt;</b> to get paragraphs</p>
<input type="hidden" id="id" value="<?php echo md5($_REQUEST['id'].$_SESSION['os_cur_user'].date("d-m-Y").time()); ?>">
<input type="hidden" id="uname" value="<?php echo $_SESSION['os_cur_user']; ?>">
<input type="hidden" id="dname" value="<?php echo $_SESSION['os_cur_disp']; ?>">
<p><textarea id="comment" rows="10" class="txt" style="width: 500px"></textarea></p>
<p>Your Rating : <input type="number" max="5" step="0.5" min="0" value="5" class="txt" style="width: 40px; text-align: right" id="rate"> /5</p>
<input type="button" id="btnCommentSubmit" value="Submit" class="btn">
</fieldset>
<?php
    }
    else
    {
?>
<input type="button" id="btnLoginComment" value="Login In to Comment on this product" class="btn">
<script>
    $("#btnLoginComment").click(function(e) {
        $("#btnLogin").click();
    });
</script>
<?php
    }
?>
<div id="comment-list"></div>
<script>
    $("#btnCommentSubmit").click(function (e) {
        if ($("#comment").val().trim() != "") {
            $.ajax({
                url: "cominsert.php",
                data: {
                    "id": $("#id").val(),
                    "product": $("#product").val(),
                    "user": $("#uname").val(),
                    "disp": $("#dname").val(),
                    "comment": $("#comment").val(),
                    "rate": $("#rate").val()
                },
                success: function (e) {
                    loadComments();
                    $("#comment").attr("value", "");
                    $("#rate").attr("value", "5");
                }
            });
        }
    });
    $(document).ready(function (e) {
        loadComments();
    });
    function loadComments() {
        $.ajax({
            url: "comlist.php",
            data: { "id": $("#product").val() },
            beforeSend: function (e) {
                temp = "<div style='background-image: url(/images/loader.gif); background-repeat: no-repeat; "
                temp += "background-position: center; height: 100px'></div>";
                $("#comment-list").html(temp);
            },
            success: function (e) {
                $("#comment-list").html(e);
            }
        });
    }
</script>