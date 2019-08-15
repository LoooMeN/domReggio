<?php
	$file = '../INPUT/' . $_REQUEST['filename'] . '.csv';
	unlink($file);
	$file = '../TEMPLATE/' . $_REQUEST['filename'] . '.php';
	unlink($file);
	$file = '../OUTPUT_TEMPLATES/' . $_REQUEST['filename'] . '.php';
	unlink($file);
	echo '<script type="text/javascript">location.href = "../index.php";</script>';
?>