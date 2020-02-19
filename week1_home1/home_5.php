<?php
/*
    Создайте массив $bmw с ячейками: model, speed, doors, year.
    Заполните ячейки значениями соответсвенно: “X5”, 120, 5, “2015”.
    Создайте массивы $toyota и $opel аналогичные массиву $bmw (заполните данными).
    Объедините три массива в один многомерный массив.
    Выведите значения всех трех массивов в виде:
CAR name
name ­ model ­speed ­ doors ­ year
Например:
CAR bmw
X5 ­120 ­ 5 ­ 2015
*/

$bmw = array(
    'model' => 'x5',
    'speed' => 120,
    'doors' => 5,
    'year'  => '2015',
);
$toyota = array(
    'model' => 'corolla',
    'speed' => 110,
    'doors' => 4,
    'year'  => '2012',
);
$opel = array(
    'model' => 'astra',
    'speed' => 90,
    'doors' => 2,
    'year'  => '2010',
);

$cars = array(
    'bmw'       => $bmw,
    'toyota'    => $toyota,
    'opel'      => $opel
);


foreach ($cars as $name => $car) {
    echo 'Car: ' . $name . '<br>';
    echo $car['model'] . ', ' . $car['speed'] . ', ' . $car['doors'] . ', ' . $car['year'] . '.<br><br>';
}