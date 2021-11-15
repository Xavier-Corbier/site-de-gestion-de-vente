<?php
	require File::build_path(array("css", "template", "header.php"));
	$filepath = File::build_path(array("view", static::$object, "$view.php"));
	require $filepath;
	require File::build_path(array("css", "template", "footer.php"));
?>
