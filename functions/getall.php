<?php
	$newname = '../computed.csv';
	if (file_exists($newname))
		unlink($newname);
	file_put_contents($newname, "Teacher;Data;Name\r\n");
	foreach (glob("../OUTPUT/*") as $filename){
		$name = $filename;
		$name = str_replace('../OUTPUT/', '', $name);
		$name = str_replace('.csv', '', $name);
		$content = file_get_contents($filename);
		$content = explode("\r\n", $content);
		array_shift($content);
		foreach ($content as $value) {
			if ($value){
				$value = $name . ';' . trim($value) . "\r\n";
				file_put_contents($newname, $value, FILE_APPEND);
		}}
	}
	if (file_exists($newname)) {
	    header('Content-Description: File Transfer');
	    header('Content-Type: application/octet-stream');
	    header('Content-Disposition: attachment; filename='.basename($newname));
	    header('Content-Transfer-Encoding: binary');
	    header('Expires: 0');
	    header('Cache-Control: must-revalidate');
	    header('Pragma: public');
	    header('Content-Length: ' . filesize($newname));
	    ob_clean();
	    flush();
	    readfile($newname);
	}
	unlink($newname);
?>