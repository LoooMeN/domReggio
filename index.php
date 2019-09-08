<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="shortcut icon" href="http://domreggio.com.ua/wp-content/themes/reggio/img/favicon.png" type="image/png">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="./CSS/style.css">
	<title>MAIN</title>
	<?php
	// get teacher names and their students
	foreach (glob("./INPUT/*") as $filename) {
		$name = explode('/', $filename)[2];
		$filename = explode('.', $name)[0];
		$data = file_get_contents('./template.php');
		$templates = './TEMPLATES/' . $filename . '.php';
		$templatesOutput = './OUTPUT_TEMPLATES/' . $filename . '.php';
	    file_put_contents ( $templates , $data);
	    $data = file_get_contents('./templateOutput.php');
	    file_put_contents ( $templatesOutput , $data);
	}?>
</head>
<body>
	<div class="spacer"></div>
	<div class="main_wrapper">
		<div class="logo_wrapper"><img src="http://domreggio.com.ua/wp-content/themes/reggio/img/favicon.png"></div>
		<!-- ГРИД -->
		<div class="grid">
			<?php 
			foreach (glob("./INPUT/*") as $filename) {
				$name = explode('/', $filename)[2];
				$filename = explode('.', $name)[0];
				$link = $filename . '.php';
				echo "<a href='./TEMPLATES/$link' target='_blank'><div class='grid-item'>$filename</div></a>";
			}?>
		</div>
		<!-- ЗАГРУЗИТЬ ДЕТЕЙ -->
		<form class="form" action="./functions/upload.php" method="post" enctype="multipart/form-data">
		    <h4>ВЫБЕРИТЕ ФАЙЛ С ДЕТЬМИ ДЛЯ ЗАГРУЗКИ:</h3>
		    <ul>
		    	<li>Он должен быть назван по английски</li>
		    	<li>Файл должен быть в разрешении .csv</li>
		    	<li>Название файла должно быть фамилией препода NAZIROVA.scv</li>
		    </ul>
		    <input type="file" name="fileToUpload" id="fileToUpload">
		    <input class="button" type="submit" value="ЗАГРУЗИТЬ" name="submit">
		</form>
		<!-- УДАЛИТЬ СПИСОК -->
		<form class="form" method="post" action="./functions/clear.php">
			<h4>ОЧИСТКА СПИСКА ИНДИВИДУАЛОК (убрать то что отмечали учителя)</h4>
			<h5>Если нужного файла тут нет, то его ещё не запоняли</h5>
			<select name='filename'>
				<?php 
				foreach (glob("./OUTPUT/*.csv") as $filename) {
					$name = explode('/', $filename)[2];
					$filename = explode('.', $name)[0];
					echo "<option name='option' class='option' value='$filename'>$filename</option>";
				}?>
			</select>
			<input type="submit" name="submit" value="ОЧИСТИТЬ" class="button">
		</form>
		<!-- УДАЛИТЬ ТИЧЕРА -->
		<form class="form" method="post" action="./functions/delete.php">
			<h4>КОГО УДАЛЯЕМ?</h4>
			<h5>Если нужного файла тут нет, то его ещё не запоняли<br>Список регистраций препода останется доступен</h5>
			<select name='filename'>
				<?php 
				foreach (glob("./INPUT/*.csv") as $filename) {
					$name = explode('/', $filename)[2];
					$filename = explode('.', $name)[0];
					echo "<option name='option' class='option' value='$filename'>$filename</option>";
				}?>
			</select>
			<input type="submit" name="submit" value="УДАЛИТЬ" class="button">
		</form>
		<!-- СКАЧАТЬ СПИСОК -->
		<form class="form" method="post" action="./functions/download.php">
			<h4>КАКОЙ ФАЙЛ СКАЧИВАЕМ?</h4>
			<h5>Если нужного файла тут нет, то его ещё не запоняли</h5>
			<select name='filename'>
				<?php 
				foreach (glob("./OUTPUT/*.csv") as $filename) {
					$name = explode('/', $filename)[2];
					$filename = explode('.', $name)[0];
					echo "<option name='option' class='option' value='$filename'>$filename</option>";
				}?>
			</select>
			<input type="submit" name="submit" value="СКАЧАТЬ" class="button">
		</form>
		<!-- СКАЧАТЬ ВСЕ СПИСКИ -->
		<form class="form" method="post" action="./functions/getall.php">
			<h4>СКАЧАТЬ ВСЕ СПИСКИ</h4>
			<input type="submit" name="submit" value="СКАЧАТЬ" class="button">
		</form>
		<!-- УДАЛИТЬ ДЕТЕЙ ПО ДАТАМ -->
		<form class="form" method="post" action="./functions/delSome.php">
			<h4>УДАЛИТЬ ВСЕ ЗАПИСИ ОТ И ДО ДАТЫ ВКЛЮЧИТЕЛЬНО</h4>
			<?php
				echo "<h4>От</h4>";
				echo '<input class="date" type="date" name="date1"><br>';
				echo "<h4>До</h4>";
				echo '<input class="date" type="date" name="date2"><br>';
			?>
			<input class="button" type="submit" name="submit1" value="ПРИМЕНИТЬ">
		</form>
	</div>
	<div class="spacer"></div>
</body>
</html>