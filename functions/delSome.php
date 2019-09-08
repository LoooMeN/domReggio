<?php
    $date1 = $_REQUEST['date1'];
    $date2 = $_REQUEST['date2'];
    if ($date1 && $date2 && $date2 > $date1)
    {
        foreach (glob("../OUTPUT/*") as $filename){
            $content = file_get_contents($filename);
            file_put_contents($filename, "Data;Name");
            $content = explode("\r\n", $content);
            array_shift($content);
            foreach ($content as $value) {
                $date = explode(';', $value)[0];
                if ($date < $date1 || $date > $date2)
                    file_put_contents($filename, "\r\n" . $value, FILE_APPEND);
            }
        }
        echo '<script type="text/javascript">location.href = "../index.php";</script>';
    }
    else
        echo '<script type="text/javascript">location.href = "../index.php";alert("Надо заполнить оба поля дат. Вторая дата должна быть такой же или позже чем первая.");</script>';
?>