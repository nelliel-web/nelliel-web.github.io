<?php
require('functions.php');


echo '<b>' . 'Задание 1' . '</b><br>';
$forTask1 = [
    'Lorem ipsum dolor sit amet',
    'consectetur adipisicing elit',
    'sed do eiusmod tempor incididunt ut labore et dolore magna aliqua',
    ['text', 'text2'],
    123,
    '911'
];
task1($forTask1, false);


echo '<hr><b>' . 'Задание 2' . '</b><br>';
task2('*', 2, 3, 4.3, 'dscs', ['das', 21]);


echo '<hr><b>' . 'Задание 3' . '</b><br>';
task3(4, 6);


echo '<hr><b>' . 'Задание 4' . '</b><br>';
/*  Выведите информацию о текущей дате в формате 31.12.2016 23:59
    Выведите unixtime время соответствующее 24.02.2016 00:00:00. */
echo date('d.m.Y H:i') . '<br>';
echo '24.02.2016 00:00:00 = unixtime ' . strtotime('24.02.2016 00:00:00');


echo '<hr><b>' . 'Задание 5' . '</b><br>';
/*  Дана строка: “Карл у Клары украл Кораллы”. Удалить из этой строки все заглавные буквы “К”.
    Дана строка: “Две бутылки лимонада”. Заменить “Две”, на “Три”. По желанию дополнить задание. */
$string1 = 'Карл у Клары украл Кораллы';
$string2 = 'Две бутылки лимонада';
echo $string1 . '<br>';
echo str_replace('К', '', $string1) . '<br><br>';

echo $string2 . '<br>';
echo str_replace(['Две', 'лимонада'], ['Три', 'воды'], $string2);


echo '<hr><b>' . 'Задание 6' . '</b><br>';
/*  Создайте файл test.txt средствами PHP. Поместите в него текст - “Hello again!” Напишите функцию,
которая будет принимать имя файла, открывать файл и выводить содержимое на экран. */

$file_name = 'test.txt';
$new_file = fopen($file_name, 'w');
fwrite($new_file, 'Hello again!');
fclose($new_file);
task4($file_name);