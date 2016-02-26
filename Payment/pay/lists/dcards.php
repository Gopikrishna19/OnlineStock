<div class="sec-full">
    <ul>
        <li class="met-btn" id="btn-visa">VISA Cards</li>
        <li class="met-btn" id="btn-mast">Master Cards</li>
        <li class="met-btn" id="btn-maes">Maestro Cards</li>
    </ul>
</div>
<div id="visa" style="display: none">
    <div class="sec-full">
        <form action="processing/" method="post" class="form">
            <b>Card Number : </b><br><input type="text" name="cnumber" required maxlength="16"><br>
            <b>Valid till (mm-yy) :</b><br><input type="text" name="cvalid" required maxlength="5"><br>
            <b>Name on the Card :</b><br><input type="text" name="cname" required><br>
            <input type="hidden" value="debvisa" name="cat">
            <span class="app"></span>
        </form>
    </div>
</div>
<div id="mast" style="display: none">
    <div class="sec-full">
        <form action="processing/" method="post" class="form">
            <b>Card Number : </b><br><input type="text" name="cnumber" required maxlength="15"><br>
            <b>Name on the Card :</b><br><input type="text" name="cname" required><br>
            <b>CVC2 Code :</b><br><input type="text" name="ccode" required maxlength="3"><br>
            <input type="hidden" value="debmast" name="cat">
            <span class="app"></span>
        </form>
    </div>
</div>
<div id="maes" style="display: none">
    <div class="sec-full">
        <form action="processing/" method="post" class="form">
            <b>Card Number : </b><br><input type="text" name="cnumber" required maxlength="15"><br>
            <b>Valid till (mm-yy) :</b> (optional for some banks)<br><input type="text" name="cvalid" maxlength="5"><br>
            <b>Name on the Card :</b><br><input type="text" name="cname" required><br>
            <b>CVV Code :</b><br><input type="text" name="ccode" required maxlength="3"><br>
            <input type="hidden" value="debmaes" name="cat">
            <span class="app"></span>
        </form>
    </div>
</div>
<div id="to-app" style="display: none">
    <input type="hidden" name="un" value="<?php echo base64_encode($_REQUEST['un']) ?>">
    <input type="hidden" name="ud" value="<?php echo base64_encode($_REQUEST['ud']) ?>">
    <input type="hidden" name="am" value="<?php echo base64_encode($_REQUEST['am']) ?>">
    <input type="submit" name="submit" value="pay" class="btn">
</div>
<script>
    $(".met-btn").click(function(e) {
        $(".met-btn").removeClass("sec-btn-foc");
        $(this).addClass("sec-btn-foc");
        var id = $(this).attr("id");
        $(".app").html("");
        $(".app").html($("#to-app").html());
        switch(id) {
            case "btn-visa": $("#method-det").html($("#visa").html()); break;
            case "btn-mast": $("#method-det").html($("#mast").html()); break;
            case "btn-maes": $("#method-det").html($("#maes").html()); break;
        }
    });
</script>