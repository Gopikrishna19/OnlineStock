                </div>
            </td>
        </tr>
    </table>
</div>
<div class="center-it" id="div-footer">
<table width="100%" style="color: #999; font-size: 12px; text-align: center">
<tr valign="top">
<td width="33%"><b>Support</b><br><br>
<a href="/help"><div>How To</div></a><br>
<a href="/help/contact"><div>Contact Us</div></a><br>
<a href="/help/faq"><div>FAQ</div></a>
</td>
<td width="33%"><b>User</b><br><br>
<?php 
 if(isset($_SESSION['os_cur_user'])) {
     if($_SESSION['os_cur_user'] == "Administrator") { echo "<a href='/admin'><div>Administration</div></a><br>"; }
     else { ?>
<a href="/myaccount"><div>My Account</div></a><br>
<a href="/myaccount/orders"><div>My Orders</div></a><br>
<a href="/myaccount/mycart"><div>My Cart</div></a><br>
<a href="/myaccount/history"><div>My History</div></a><br>
<?php     }
 }
 else { echo "<a href='/users/login'>Login to access these links</a>"; }
 ?>
</td>
<td width="33%"><b>Quick Links</b><br><br>
<a href="/search"><div>Search</div></a><br>
<a href="/"><div>Home</div></a><br>
</td>
</tr>
</table>
<?php if(isset($dbc)) mysqli_close($dbc); ?>
</div>
<script>
    $(function () {
        var oTop = $("#div-category").offset().top - 10;
        var stickyNav = function () {
            var sTop = $(window).scrollTop();
            if (sTop > oTop) {
                $("#div-category").css({ "position": "fixed", "margin-top": "10px" });
            }
            else {
                $("#div-category").css({ "position": "relative", "margin-top": "-50px" });
            }
        }
        stickyNav();
        $(window).scroll(function (e) {
            stickyNav();
        })
    });
</script>
</body>
</html>