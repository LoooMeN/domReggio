<?php
  $a = $_REQUEST['a'];
  $name = $_REQUEST['name'];
  $name1 = $name;
  $name = '../OUTPUT/' . $name . '.csv';
  $text = file_get_contents ($name);
  $text = explode("\r\n", $text);
  $output .= $text[0] . "\r\n";
  for ($i=1; $text[$i]; $i++) { 
    if ($i != $a)
      $output .= $text[$i] . "\r\n";
  }
  file_put_contents($name, $output);
  echo '<script type="text/javascript">location.href = "../OUTPUT_TEMPLATES/'.$name1.'.php";</script>'
?>