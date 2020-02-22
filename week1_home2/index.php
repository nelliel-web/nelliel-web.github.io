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

task3(rand(1,10),rand(1,10));