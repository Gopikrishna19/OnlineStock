<?php
if(!isset($_SESSION['os_cur_user']))
	{
		?>
        <form action="/users/login/" method="post">
	 	<input type="hidden" value="<?php echo $_SERVER['REQUEST_URI']; ?>" name='red_uri'>
		Log In to access featured contents :
		<input type="submit" value="Log In" name="btnSubmit" class="btn" id="btnLogin"> | 
		<a href="/users/register">Register</a>
		</form>
        <?php
	}
    elseif($_SESSION['os_cur_user']=="Administrator")
    {
        ?>
        Welcome back! 
        <div style="float: right; margin-top: 2px; width: 175px" id="main-menu">
            <a href="/admin"><div class="btn-menu">Administration &nbsp; &loz; </div></a>
            <div style="position: absolute; display: none; z-index: 1000" id="sub-menu">
                <a href="/admin/products"><div class="btn-menu" style="width: 145px">Products</div></a>
                <a href="/admin/orders"><div class="btn-menu">Orders</div></a>
                <a href="/admin/inbox"><div class="btn-menu">Messages</div></a>
                <a href="/admin/chpass"><div class="btn-menu">Settings</div></a>
            </div>
        </div>
        <button id='btnLogout' class="btn">Log Out</button>
                <script>
                    $("#btnLogout").click(function (e) {
                        $.ajax({
                            url: "/common/logout.php",
                            success: function (t) {
                                window.location.reload();
                            }
                        });
                    });
                    $("#main-menu").hover(
                        function (e) {
                            $("#sub-menu").slideDown(100);
                        },
                        function (e) {
                            $("#sub-menu").slideUp(100);
                        });
                </script>
        <?php
    }
	else
	{
		echo 	"Welcome, ".$_SESSION['os_cur_disp']."!";
		?>
                <div style="float: right; margin-top: 2px; width: 151px" id="main-menu">
                    <a href="/myaccount" style="min-width: 150px"><div class="btn-menu">My Account &nbsp; &loz; </div></a>
                    <div style="position: absolute; display: none" id="sub-menu">
                        <a href="/myaccount/orders"><div class="btn-menu">My Orders</div></a>
                        <a href="/myaccount/mycart"><div class="btn-menu">My Cart</div></a>
                        <a href="/myaccount/history"><div class="btn-menu">Purchase History</div></a>
                    </div>
                </div>
				<button id='btnLogout' class="btn">Log Out</button>
                <script>
                    $("#btnLogout").click(function(e) {
                        $.ajax({
                            url: "/common/logout.php",
                            success: function(t) {
                                window.location.reload();
                            }
                        });
                    });
					$("#main-menu").hover(
						function(e) {
							$("#sub-menu").slideDown(100);
						},
						function(e) {
							$("#sub-menu").slideUp(100);
						});
				</script>
        <?php
	}
?>
