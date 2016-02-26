<div class="sec-full">
    <ul>
        <li class="met-btn" id="btn-done">Done Card</li>
        <li class="met-btn" id="btn-mobi">Mobile</li>
    </ul>
</div>
<div id="done" style="display: none">
    <div class="sec-full">
        <form action="processing/" method="post" class="form">
            <b>Card Number : </b><br><input type="text" name="cnumber" required maxlength="16"><br>
            <b>Pin : </b><br><input type="text" name="ccode" required maxlength="5"><br>
            <input type="hidden" value="mdone" name="cat">
            <span class="app"></span>
        </form>
    </div>
</div>
<div id="mobi" style="display: none">
    <div class="sec-full">
        <form action="processing/" method="post" class="form">
            <b>Mobile Number : </b>(include county code)<br><input type="text" name="cnumber" required maxlength="13"><br>
            <b>Promo Code : </b>(optional)<br><input type="text" name="ccode" maxlength="10"><br>
            <input type="hidden" value="mmobi" name="cat">
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
            case "btn-done": $("#method-det").html($("#done").html()); break;
            case "btn-mobi": $("#method-det").html($("#mobi").html()); break;
        }
    });
</script>