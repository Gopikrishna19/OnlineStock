<div>
<form method="get" action="/search">
<input type="text" class="txt" id="txtSearch" name="key" value="<?php echo isset($_REQUEST["key"])?$_REQUEST["key"]:''; ?>" autocomplete="off"> In 
<select id="cmbCat" class="txt" name="in">
<option value="cat_all">All</option>
<?php require_once("category.php"); getCategoryOption(); ?>
</select>
<button id="btnSearch" style="background-image: url(/images/search.png);
								background-size: 16px 16px; background-position: center;
                                background-repeat: no-repeat" class="btn" type="submit"></button>
<?php echo "<a href='/' class='menu-item'>Home</a>"; ?>
</form>
<div id="search-drop-down"></div>
</div>
<script>
$("#search-drop-down").hide();
$("#txtSearch").keyup(function(e) {
    if($(this).val() == '')
		$("#search-drop-down").slideUp();
	else
	{
		$("#search-drop-down").slideDown();
		$.ajax({
			url : "/common/search.php",
			data : { "key" : $(this).attr("value") },
			success: function(e) {
				$("#search-drop-down").html(e);
			}
		});
	}
});
</script>