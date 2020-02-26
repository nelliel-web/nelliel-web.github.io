<?php
require('src/functions.php');
?>
<link rel="stylesheet" href="src/style.css" >
<?php

echo '<b>' . 'Задание 3.1' . '</b><br>';
/*
Дан XML файл. Сохраните его под именем data.xml.
Написать скрипт, который выведет всю информацию из этого файла в удобно читаемом виде.
Представьте, что результат вашего скрипта будет распечатан и выдан курьеру для доставки,
разберется ли курьер в этой информации?
*/
$fileData = file_get_contents('data.xml');
get_delivery_info($fileData);