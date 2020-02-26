<?php
require('src/functions.php');
?>
    <link rel="stylesheet" href="src/style.css">
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


echo '<hr><b>' . 'Задание 3.2' . '</b><br>';
/*
Создайте массив, в котором имеется как минимум 1 уровень вложенности. Преобразуйте его в JSON. Сохраните как output.json.
Откройте файл output.json. Случайным образом, используя функцию rand(), решите изменять данные или нет. Сохраните как output2.json.
Откройте оба файла. Найдите разницу и выведите информацию об отличающихся элементах.
*/
$games = [
    'Piranha Bytes' => [
        'Gothic' =>
            ['Gothic 1', 'Gothic 2'],
        'Risen' =>
            [
                'Risen 1',
                'Risen 2',
            ],
        'ELEX' => 'elex',
    ],
    'Rock Star Games' => [
        'GTA' => [
            'Vice City',
            'San Andreas',
        ],
        'Max pane' => 'Max pane 3',
        'Red dead redemption' => [
            'red dead redemption',
            'red dead redemption 2',
        ],
    ],
];
$games_replace = [
    'Gothic 2' => 'Gothic 2: Night of the Raven',
    'Risen 2' => 'Risen 2: Dark water',
    'elex' => 'ELEX',
];
$output1 = 'output.json';
$output2 = 'output2.json';

//Записываем данные в .json
create_json_file($games, $output1);

//Открываем .json и перезаписываем его, или ничего не делаем
open_json_file($output1, $games_replace);

//Сравниваем .json файлы и выводим различия
get_diff_json($output1, $output2);







