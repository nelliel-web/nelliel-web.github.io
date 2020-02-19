<?php

$age = 25;
echo 'Ваш возраст: ' . $age . '<br>';

if ($age >= 18 and $age <= 65) {
    echo 'Вам еще работать и работать';
}elseif ($age > 65) {
    echo 'Вам пора на пенсию';
}elseif ($age >= 1 and $age < 18) {
    echo 'Вам ещё рано работать';
}else{
    echo 'Неизвестный возраст';
}