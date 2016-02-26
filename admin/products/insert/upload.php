<?php
if (($_FILES["file"]["type"] == "image/gif" || $_FILES["file"]["type"] == "image/jpeg" ||
	  $_FILES["file"]["type"] == "image/png") && ($_FILES["file"]["size"] < 1000000))
{
	if ($_FILES["file"]["error"] > 0)
    {
    	echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  	else
    {
    	echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    	echo "Type: " . $_FILES["file"]["type"] . "<br />";
   		move_uploaded_file($_FILES["file"]["tmp_name"], "../../../images/uploaded/temp/" . $_FILES["file"]["name"]);
		echo "<div style='background-image: url(/images/uploaded/temp/".$_FILES["file"]["name"].");".
			 "background-size: contain; background-position: center; height: 100px; width: 100px;".
			 "background-repeat: no-repeat'></div>".
			 "<input type='hidden' name='pImage' value='".$_FILES["file"]["name"]."'>";
    }
}
else
{
    echo "Invalid file";
}
?>