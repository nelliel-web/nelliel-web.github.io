<?php
/*
    Используя цикл for, выведите таблицу умножения размером 10x10. Таблица должна быть выведена с помощью HTML тега <table>.
    Если значение индекса строки и столбца чётный, то результат вывести в круглых скобках.
    Если значение индекса строки и столбца Нечётный, то результат вывести в квадратных скобках.
    Во всех остальных случаях результат выводить просто числом.
*/
?>
<style>
    table{
        border: 1px solid #777;
        margin: 0 auto;
        border-spacing: 0px;
    }
    table td{
        border: 1px solid #777;
        margin: 0;
        padding: 5px;
        background-color: #f5f5f5;
    }
</style>
<?php
echo "<table>\n";
for ($i = 1; $i <= 10; $i++) {
    echo "\t<tr>\n";
    if($i % 2 == 0) {
        for ($n = 1; $n <= 10; $n++) {
            if($n % 2 == 0) {
                echo "\t\t<td>$i * $n = (" . $i * $n . ")</td>\n";
            }else{
                echo "\t\t<td>$i * $n = " . $i * $n . "</td>\n";
            }
        }
    }elseif($i % 2 > 0) {
        for ($n = 1; $n <= 10; $n++) {
            if($n % 2 > 0) {
                echo "\t\t<td>$i * $n = [" . $i * $n . "]</td>\n";
            }else{
                echo "\t\t<td>$i * $n = " . $i * $n . "</td>\n";
            }
        }
    }else
        for ($n = 1; $n <= 10; $n++) {
            echo "\t\t<td>$i * $n = " . $i * $n . "</td>\n";
        }
}
echo "</table>";
