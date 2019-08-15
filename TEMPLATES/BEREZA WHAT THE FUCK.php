<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="shortcut icon" href="http://domreggio.com.ua/wp-content/themes/reggio/img/favicon.png" type="image/png">
	<link rel="stylesheet" type="text/css" href="../CSS/style_form.css">
	<title><?php echo basename(__FILE__, ".php");?> ФОРМА</title>
	<?php 
	$filename = basename(__FILE__, ".php"); 
	$filenameInput = "../INPUT/" . $filename . ".csv";
	$filenameOutput = "../OUTPUT/" . $filename . ".csv";
	$filename = $filename . '.php';
	?>
</head>
<body>
	<div class="spacer"></div>
	<div class="main_container">
		<div class="logo_wrapper"><img src="http://domreggio.com.ua/wp-content/themes/reggio/img/favicon.png"></div>
		<h2><?php echo basename(__FILE__, ".php");?></h2>
		<form action="" id="form" method="POST">
			<input class="date" type="date" name="date"><br> 
			<?php include("../functions/children.php");?>
			<div class="buttons">
				<input type="submit" class="submit" name="submit" value="ОТПРАВИТЬ">
				<a target="_blank" href="<?php echo('../OUTPUT_TEMPLATES/' . basename(__FILE__))?>"><div class="button">ПРОСМОТРЕТЬ</div></a>
			</div>
		</form>
		<?php include("../functions/form.php");?>
	</div>
</body>
</html>