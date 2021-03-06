<?php
require('src/functions.php');


echo '<b>' . 'Задание 1' . '</b><br>';
/*
Функция должна принимать массив строк и выводить каждую строку в отдельном параграфе (тег <p>)
Если в функцию передан второй параметр true, то возвращать (через return) результат в виде одной объединенной строки.
*/
$forTask1 = [
    'Lorem ipsum dolor sit amet',
    'consectetur adipisicing elit',
    'sed do eiusmod tempor incididunt ut labore et dolore magna aliqua',
    ['text', 'text2'],
    123,
    '911'
];
echo task1($forTask1, true);


echo '<hr><b>' . 'Задание 2' . '</b><br>';
/*
Функция должна принимать переменное число аргументов.
Первым аргументом обязательно должна быть строка, обозначающая арифметическое действие, которое необходимо выполнить со всеми передаваемыми аргументами.
Остальные аргументы это целые и/или вещественные числа.
 */
task2("+");


echo '<hr><b>' . 'Задание 3' . '</b><br>';
/* Функция должна принимать два параметра – целые числа.
   Если в функцию передали 2 целых числа, то функция должна отобразить таблицу умножения размером со значения параметров,
   переданных в функцию. (Например если передано 8 и 8, то нарисовать от 1х1 до 8х8). Таблица должна быть выполнена с использованием
   тега <table>. В остальных случаях выдавать корректную ошибку.
*/
task3(4, 6);


echo '<hr><b>' . 'Задание 4' . '</b><br>';
/*  Выведите информацию о текущей дате в формате 31.12.2016 23:59
    Выведите unixtime время соответствующее 24.02.2016 00:00:00. */
task4();


echo '<hr><b>' . 'Задание 5' . '</b><br>';
/*  Дана строка: “Карл у Клары украл Кораллы”. Удалить из этой строки все заглавные буквы “К”.
    Дана строка: “Две бутылки лимонада”. Заменить “Две”, на “Три”. По желанию дополнить задание. */
$string1 = 'Карл у Клары украл Кораллы';
$string2 = 'Две бутылки лимонада';
task5($string1, $string2);


echo '<hr><b>' . 'Задание 6' . '</b><br>';
/*  Создайте файл test.txt средствами PHP. Поместите в него текст - “Hello again!” Напишите функцию,
которая будет принимать имя файла, открывать файл и выводить содержимое на экран. */

$file_name = 'test.txt';
$file_text = 'Hello again!';
task6($file_name, $file_text);
task7($file_name);