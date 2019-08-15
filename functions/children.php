<?php
	$names = file_get_contents ($filenameInput);
	$names = mb_convert_encoding($names, 'UTF-8', 'cp1251');
	$names = explode("\n", $names);
	$json = json_encode($names);
?>

<script type="text/javascript">
	var container = document.getElementById('form');
	var name = <?php echo $json;?>;
	name.slice(0, -1);
	var array = name.split(',');
	for (var i = 0; array[i]; i++)
	{
		var span = document.createElement('span');
		var input = document.createElement('input');
		var br = document.createElement('br');
		var span2 = document.createElement('span');

		span.className = 'radio';
		span2.innerText = array[i];
		input.type = 'checkbox';
		input.name = 'checkbox_list[]';
		input.className = 'switcher';
		input.value = array[i];
		span.onclick = test;

		function test(ee) {
			var test = ee.path.length == 8 ? ee.path[1] : ee.path[0];
			var radio = test.children[0];
			if (!radio.checked)
				radio.checked = true;
			else
				radio.checked = false;
		}

		span.appendChild(input);
		span.appendChild(span2);
		container.appendChild(span);
		container.appendChild(br);
	}
</script>