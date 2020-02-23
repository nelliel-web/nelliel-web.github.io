<?php


function task1(array $array, bool $optional = false)
{
    $array = array_filter($array, function ($string) {
        return is_string($string);
    });

    if(!empty($array)) {
        if ($optional === false) {
            foreach ($array as $text) {
                echo '<p>' . $text . '</p>';
            }
        } elseif ($optional === true) {
            return implode('. ', $array);
        }
    }else{
        echo 'В массиве нет строк';
    }
}


function task2($sign, ...$numbers)
{
    if (isset($numbers) and 1 < count($numbers)) {
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


function task3($int1, $int2)
{
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