<?php
	$file = '../OUTPUT/' . $_REQUEST['filename'] . '.csv';
	unlink($file);
	echo '<script type="text/javascript">location.href = "../index.php";</script>';
?>