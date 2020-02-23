<?php


function task1(array $array, bool $optional = false)
{
    $array = array_filter($array, function ($string) {
        return is_string($string);
    });

    if (!empty($array)) {
        if ($optional === false) {
            foreach ($array as $text) {
                echo '<p>' . $text . '</p>';
            }
        } elseif ($optional === true) {
            return implode('. ', $array);
        }
    } else {
        echo 'В массиве нет строк';
    }
}


function task2($sign, ...$numbers)
{
    if (1 < count($numbers)) {
        if ($sign == '+' or $sign == '-' or $sign == '*' or $sign == '**' or $sign == '/') {

            $numbers = array_filter($numbers, function ($array) {
                return is_numeric($array);
            });
            if (count($numbers) > 1) {
                $expression = implode($sign, $numbers);

                if ($sign == '+') {
                    $result = array_sum($numbers);
                } elseif ($sign == '-') {
                    $result = 0;
                    foreach ($numbers as $number) {
                        $result -= $number;
                    }
                } elseif ($sign == '*') {
                    $result = 1;
                    foreach ($numbers as $number) {
                        $result *= $number;
                    }
                } elseif ($sign == '/') {
                    $result = $numbers[0];
                    array_shift($numbers);
                    foreach ($numbers as $number) {
                        $result /= $number;
                    }
                } else {
                    $result = $numbers[0];
                    array_shift($numbers);
                    foreach ($numbers as $number) {
                        $result **= $number;
                    }
                }

                // Резуьтат выполнения
                echo $expression . ' = ' . $result;
            } else {
                echo 'Слишком мало цифр для выполнения операций';
                return false;
            }

        } else {
            echo 'Передан неверный арифметический знак';
            return false;
        }
    } else {
        echo 'Переданно меньше двух цифр';
        return false;
    }
}


function task3(int $rows, int $cols)
{
    if ($rows != 0 and $cols != 0) {

        echo "<table border=\"1\">\n";
        for ($i = 1; $i <= $rows; $i++) {
            echo "\t<tr>\n";
            for ($n = 1; $n <= $cols; $n++) {
                echo "\t\t<td>$i * $n = " . $i * $n . "</td>\n";
            }
            echo "\t</tr>\n";
        }
        echo "</table>\n";

    } else {
        echo 'Один или оба аргумента функции равен или меньше нуля';
    }
}


function task4()
{
    echo date('d.m.Y H:i') . '<br>';
    echo '24.02.2016 00:00:00 = unixtime ' . strtotime('24.02.2016 00:00:00');
}


function task5(string $string1, string $string2)
{
    echo $string1 . '<br>';
    echo str_replace('К', '', $string1) . '<br><br>';

    echo $string2 . '<br>';
    echo str_replace(['Две', 'лимонада'], ['Три', 'воды'], $string2);
}


function task6(string $file_name, string $file_text)
{
    file_put_contents($file_name, $file_text);
}


function task7($file_name)
{
    if (file_exists($file_name)) {
       echo file_get_contents($file_name);
    } else {
        echo 'Такого имени файла не существует';
    }
}