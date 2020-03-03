<?php
require('src/functions.php');
?>
    <link rel="stylesheet" href="src/style.css">
<?php

echo '<b>' . 'Задание 3.1' . '</b><br>';
/* =======================================================================
Дан XML файл. Сохраните его под именем data.xml.
Написать скрипт, который выведет всю информацию из этого файла в удобно читаемом виде.
Представьте, что результат вашего скрипта будет распечатан и выдан курьеру для доставки,
разберется ли курьер в этой информации?
*/
getDeliveryInfo(file_get_contents('data.xml'));


echo '<hr><b>' . 'Задание 3.2' . '</b><br>';
/* =======================================================================
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
$output_1 = 'output.json';
$output_2 = 'output2.json';

//Записываем данные в .json
createJsonFile($games, $output_1);

//Открываем .json и перезаписываем его, или ничего не делаем
replaceValue(openJsonFile($output_1), $games_replace, (bool)rand(0, 1));

//Сравниваем .json файлы и выводим различия
getDiffJson($output_1, $output_2, ',');


echo '<hr><b>' . 'Задание 3.3' . '</b><br>';
/* =======================================================================
Программно создайте массив, в котором перечислено не менее 50 случайных чисел от 1 до 100.
Сохраните данные в файл csv. Откройте файл csv и посчитайте сумму четных чисел.
*/
$limit = 50;
$name_file = 'num.csv';

$rand_num = createRandNumArray($limit);
createCsvFile($rand_num, $name_file);
$summ = getSummFromCsv($name_file);

echo 'Сумма случайных четных значений из файла: ' . $name_file . ' = ' . $summ;


echo '<hr><b>' . 'Задание 3.4' . '</b><br>';
/* =======================================================================
С помощью PHP запросить данные по этому "адресу" Вывести title и page_id
*/
$f_json = 'https://en.wikipedia.org/w/api.php?action=query&titles=Main%20Page&prop=revisions&rvprop=content&format=json';
$json = json_decode(file_get_contents("$f_json"), true);
echo 'Page ID: ' . $json['query']['pages']['15580374']['pageid'] . '<br>';
echo 'Title: ' . $json['query']['pages']['15580374']['title'] . '<br>';