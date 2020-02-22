<?php


function task1($array, $optional = false)
{
    /*
    Функция должна принимать массив строк и выводить каждую строку в отдельном параграфе (тег <p>)
    Если в функцию передан второй параметр true, то возвращать (через return) результат в виде одной объединенной строки.
    */
    if (is_array($array)) {
        if ($optional === false) {
            foreach ($array as $text) {
                if (is_string($text)) {
                    echo '<p>' . $text . '</p>';
                }
            }
        } elseif ($optional === true) {
            $result = '';
            foreach ($array as $text) {
                if (is_string($text)) {
                    $result .= ' ' . $text;
                }
            }
            return $result;
        } else {
            return false;
            //Второй парамент функции не является boolean
        }
    }
    return false;
    //Первый параментр функции не является массивом
}


function task2()
{
    echo 'task2';
}

function task3()
{
    echo 'task3';
}