<?php
    function getCategoryMenu()
    {
        include("config.php");
        $query = "SELECT * FROM os_category ORDER BY os_category.catDesc";
        $result = mysqli_query($dbc,$query) or die(mysqli_error($dbc));
        while($row=mysqli_fetch_row($result))
        {
        	echo "<a href='/getlist?by=".$row[0]."'><div class='div-cat-menu' id='".$row[0]."'>".$row[1]."</div></a>";
        }
    }
    function getCategoryOption()
    {
        include("config.php");
        $query = "SELECT * FROM os_category ORDER BY os_category.catDesc";
        $result = mysqli_query($dbc,$query) or die(mysqli_error($dbc));
        while($row=mysqli_fetch_row($result))
        {
            echo "<option value=".$row[0]."><div class='div-cat-menu'>".$row[1]."</div></a>";
        }   
    }
    function getCategoryUser()
    {
        ?>
        <a href="/"><div class="div-cat-menu">Home</div></a>
        <a href="/myaccount"><div class="div-cat-menu">My Account</div></a>
        <a href="/myaccount/orders"><div class="div-cat-menu">My Orders</div></a>
        <a href="/myaccount/mycart"><div class="div-cat-menu">My Cart</div></a>
        <a href="/myaccount/history"><div class="div-cat-menu">Purchase History</div></a>
        <?php
    }
    function getCategoryAdmin()
    {
        ?>
        <a href="/"><div class="div-cat-menu">Home</div></a>
        <div class="div-cat-menu div-cat-menu-selected">Products</div>
        <a href="/admin/products/insert"><div class="div-cat-menu">&raquo; New Product</div></a>
        <a href="/admin/products/update"><div class="div-cat-menu">&raquo; Edit Details & Stock</div></a>
        <a href="/admin/products/0stock"><div class="div-cat-menu">&raquo; Stock Zero</div></a>
        <div class="div-cat-menu div-cat-menu-selected">Orders</div>
        <a href="/admin/orders"><div class="div-cat-menu">&raquo; Orders</div></a>
        <div class="div-cat-menu div-cat-menu-selected">Messages</div>
        <a href="/admin/inbox"><div class="div-cat-menu">&raquo; Inbox</div></a>
        <a href="/admin/inbox/comments"><div class="div-cat-menu">&raquo; Comments</div></a>
        <div class="div-cat-menu div-cat-menu-selected">Settings</div>
        <a href="/admin/chpass"><div class="div-cat-menu">&raquo; Change Password</div></a>
        <?php
    }
    function getCategoryHelp()
    {
        ?>
        <a href="/"><div class="div-cat-menu">Home</div></a>
        <a href="/help"><div class="div-cat-menu">How To</div></a>
        <a href="/help/contact"><div class="div-cat-menu">Contact</div></a>
        <a href="/help/faq"><div class="div-cat-menu">FAQs</div></a>
        <?php
    }
?>