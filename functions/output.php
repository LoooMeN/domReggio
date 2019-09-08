<?php 
$data = file_get_contents($filenameOutput);
$data = mb_convert_encoding($data, 'UTF-8', 'cp1251');
$new = explode("\r\n", $data);
array_shift($new);
$index = 0;
foreach ($new as $value) {
	if ($value){
		$valueNew = explode(';', $value);
		$valueNew[1] = trim($valueNew[1]);
		$valueNew[0] = trim($valueNew[0]);
		$name = $_REQUEST['name'];
		$name = trim($name);
		$date1 = $_REQUEST['date1'];
		$date2 = $_REQUEST['date2'];
		if ($index == 0)
		{
			echo "<div class='grid-item'><p>ДАТА</p></div>";
			echo "<div class='grid-item'><p>ИМЯ</p></div>";
			echo "<div class='grid-item'><p>УДАЛИТЬ</p></div>";
			$index++;
		}
		$y = 0;
		foreach ($valueNew as $key) {
			if ($name != "Все" && !$date1){
				if (!$_REQUEST['submit1']){
					echo '<div class="grid-item"><p>' . $key . '</p></div>';
					$y++;
				}
				else if (strcmp($valueNew[1] , $name) == 0){
					echo '<div class="grid-item"><p>' . $key . '</p></div>';
					$y++;
				}
			}
			elseif($name == "Все" && $date1)
			{
				if ($valueNew[0] >= $date1){
					if ($date2 && $valueNew[0] <= $date2)
					{
						echo '<div class="grid-item"><p>' . $key . '</p></div>';
						$y++;
					}
					else if ($valueNew[0] == $date1)
					{
						echo '<div class="grid-item"><p>' . $key . '</p></div>';
						$y++;
					}
				}
			}
			elseif($name != "Все" && $date1)
			{
				if (strcmp($valueNew[1] , $name) == 0 && $valueNew[0] >= $date1) 
				{
					if ($date2 && $valueNew[0] <= $date2)
					{
						echo '<div class="grid-item"><p>' . $key . '</p></div>';
						$y++;
					}
					else if ($valueNew[0] == $date1)
					{
						echo '<div class="grid-item"><p>' . $key . '</p></div>';
						$y++;
					}
				}
			}
			else
				{
				echo '<div class="grid-item"><p>' . $key . '</p></div>';
				$y++;
			}
			if ($y == 2){
				echo "<form method='POST' class = 'grid-item cross' action='../functions/del1.php'>
	<input value='$index' name='a' class='hide' type='checkbox' checked='true' id='$index'>
	<input type='checkbox' name='name' class='hide' checked=true value='$filename'>
	<input type='submit' class='delete' value='Удалить'>
</form>";
			}
		}
		$index++;
}}?>