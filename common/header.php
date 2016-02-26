<?php session_start(); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $pt; ?> - My Trading Center</title>
<link href="/styles/style.css" rel="stylesheet" type="text/css">
<link href="/styles/htmlstyle.css" rel="stylesheet" type="text/css">
<script src="/scripts/jquery.js" type="text/javascript"></script>
<script src="/scripts/script.js" type="text/javascript"></script>
<script src="/scripts/checkbox.js" type="text/javascript"></script>
<script>
$(document).ready(function(e) {
	$("input[type=checkbox]").convertCB2Switch({"onColor":"#CC0","offColor":"#0CC"});
});
</script>
</head>
<body>
<div class="center-it">
    <table style="width:1000px; margin-bottom: 50px;" id="page-holder">
        <tr style="vertical-align: top">
            <td style="width: 250px">
                <div id="div-header"></div>
                <div id="div-category">
                <?php 
                    require_once("category.php"); 
                    if(isset($usermenu)) getCategoryUser(); 
                    elseif(isset($adminmenu)) getCategoryAdmin();
                    elseif(isset($helpmenu)) getCategoryHelp();
                    else getCategoryMenu(); 
                ?>
                <?php 
                if(isset($_REQUEST['by']))
                {
	            ?>
                    <script>
	                    $("#<?php echo $_REQUEST['by']; ?>").addClass("div-cat-menu-selected");
	                </script>
                <?php
                }
                ?></div>
            </td>
            <td>
                <?php if(!isset($nocpanel)) { ?><div id="div-cpanel"><?php include("cpanel.php"); ?></div> <?php } ?>
                <div id="div-menu"><?php include("menu.php"); ?></div>
                <div id="div-page">
