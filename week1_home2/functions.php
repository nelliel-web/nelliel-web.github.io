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


function task2($sign)
{
    /*
    Функция должна принимать переменное число аргументов.
    Первым аргументом обязательно должна быть строка, обозначающая арифметическое действие, которое необходимо выполнить со всеми передаваемыми аргументами.
    Остальные аргументы это целые и/или вещественные числа.
     */
    $args = func_get_args();
    if (isset($args[1])) {
        if ($sign == '+') {
            $result = $args[1];
            for ($i = 2; $i < count($args); $i++) {
                if (is_numeric($args[$i])) {
                    $result += $args[$i];
                }
            }
        } elseif ($sign == '-') {
            $result = $args[1];
            for ($i = 2; $i < count($args); $i++) {
                if (is_numeric($args[$i])) {
                    $result -= $args[$i];
                }
            }
        } elseif ($sign == '*') {
            $result = $args[1];
            for ($i = 2; $i < count($args); $i++) {
                if (is_numeric($args[$i])) {
                    $result *= $args[$i];
                }
            }
        } elseif ($sign == '/') {
            $result = $args[1];
            for ($i = 2; $i < count($args); $i++) {
                if (is_numeric($args[$i])) {
                    $result /= $args[$i];
                }
            }
        } elseif ($sign == '**') {
            $result = $args[1];
            for ($i = 2; $i < count($args); $i++) {
                if (is_numeric($args[$i])) {
                    $result **= $args[$i];
                }
            }
        } else {
            return false;
            // В функцию был неверно передан первый аргумент
        }
        echo $result;
    } else {
        return false;
        // В функцию не были переданы аргументы для арифметических действий
    }

}


function task3($int1, $int2)
{
    /* Функция должна принимать два параметра – целые числа.
       Если в функцию передали 2 целых числа, то функция должна отобразить таблицу умножения размером со значения параметров,
       переданных в функцию. (Например если передано 8 и 8, то нарисовать от 1х1 до 8х8). Таблица должна быть выполнена с использованием
       тега <table>. В остальных случаях выдавать корректную ошибку.
    1x1 1x2 1x3
    2x2 2x3 2x4

    */
    if (is_int($int1) and is_int($int2) and ($int1 != 0 and $int2 != 0)) {

        echo "<table border=\"1\">\n";
        for ($i = 1; $i <= $int1; $i++) {
            echo "\t<tr>\n";
            for ($n = 1; $n <= $int2; $n++) {
                echo "\t\t<td>$i * $n = " . $i * $n . "</td>\n";
            }
            echo "\t</tr>\n";
        }
        echo "</table>\n";
    } else {
        echo 'Один или оба аргумента функции не являются целыми числами, или один из них равен нулю';
    }

}


function task4($file_name)
{
    if (file_exists($file_name)) {
        $file = fopen($file_name, 'r');
        fpassthru($file);
        fclose($file);
    } else {
        echo 'Такого имени файла не существует';
    }
}