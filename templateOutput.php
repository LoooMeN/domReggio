<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="shortcut icon" href="http://domreggio.com.ua/wp-content/themes/reggio/img/favicon.png" type="image/png">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../CSS/style_output.css">
	<title><?php echo basename(__FILE__, ".php");?> ДАННЫЕ</title>
	<?php 
	$filename = basename(__FILE__, ".php"); 
	$filenameInput = "../INPUT/" . $filename . ".csv";
	$filenameOutput = "../OUTPUT/" . $filename . ".csv";
	?>
</head>
<body>
	<div class="spacer"></div>
	<div class="main_container">
		<div class="logo_wrapper"><img src="http://domreggio.com.ua/wp-content/themes/reggio/img/favicon.png"></div>
		<h2><?php echo $filename; ?></h2>
		<form class="form" method="post">
			<h3>Фильтр</h3>
			<?php
			echo "<h4>Выберите имя и/или дату</h4>";
			echo "<select class='selector' name='name'>";
			$file = file_get_contents($filenameInput);
			$file = mb_convert_encoding($file, 'UTF-8', 'cp1251');
			$file = explode("\n", $file);
			array_unshift($file, "Все");
			foreach ($file as $value) {
				if ($value)
					echo "<option name='name' class='option' value='$value'>$value</option>";
			}
			echo "</select><br>";
			echo "<h4>От</h4>";
			echo '<input class="date" type="date" name="date1"><br>';
			echo "<h4>До</h4>";
			echo '<input class="date" type="date" name="date2"><br>';
			?>
			<input class="submit" type="submit" name="submit1" value="ПРИМЕНИТЬ">
		</form>
		<div class="spacer"></div>
		<div class="grid">
			<?php include("../functions/output.php");?>
		</div>
	</div>
</body>
</html>