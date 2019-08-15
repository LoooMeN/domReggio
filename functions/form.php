<?php
if (!file_exists($filenameOutput))
{
	$data = 'Date;Name' . "\r\n";
	file_put_contents ( $filenameOutput , $data, FILE_APPEND);
	unset($data);
}
if (!empty($_REQUEST['date']) && !empty($_REQUEST['checkbox_list'])) {
	foreach ($_REQUEST['checkbox_list'] as $value) {
		$date = $_REQUEST['date'];
		$data .= $date . ';';
		$data .= $value;
		if (file_exists($filenameOutput))
			$search = file_get_contents ($filenameOutput);
		if (strpos($search, $data) === false) {
			$data = mb_convert_encoding($data, 'cp1251', 'UTF-8');
			file_put_contents ( $filenameOutput , $data, FILE_APPEND);
			unset($data);
		}
	}
	unset($_REQUEST['submit']);
}
?>