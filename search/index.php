<?php
    $pp="../";
    if(isset($_REQUEST["key"])) $pt = $_REQUEST['key'].' | Search';
    else $pt = 'Search';
    include("../common/header.php");
    if(isset($_REQUEST["key"]))
    {
        include_once("../common/get-products.php");
        getProducts(0,$_REQUEST["in"],$pp,$_REQUEST["key"]);
    }
    else
    {
        echo "<span class='list-head'>Enter a search key to perform search</span>";
    }
    include("../common/footer.php")
?>