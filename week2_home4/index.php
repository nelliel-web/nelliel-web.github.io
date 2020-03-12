<?php
require_once('src/I_Carsharing.php');
require_once('src/classes/Traits.php');
require_once('src/classes/A_Rate.php');
require_once('src/classes/BaseRate.php');
require_once('src/classes/HoursRate.php');
require_once('src/classes/DaysRate.php');
require_once('src/classes/StudentsRate.php');


echo '<h2>Тариф - Базовый</h2>';
$rate = new BaseRate();
$rate->hours = 24;
$rate->minutes = 30;
$rate->km = 25;
$rate->age = 19;
$rate->add_gps = true;

echo '<pre>';
print_r($rate);
echo '</pre>';
echo '<br>Итоговая стоимость: ' . $rate->getPrice() . '<hr>';


echo '<h2>Тариф - Почасовой</h2>';
$rate = new HoursRate();
$rate->hours = 24;
$rate->minutes = 30;
$rate->km = 25;
$rate->age = 19;
$rate->add_driver = true;
$rate->add_gps = true;

echo '<pre>';
print_r($rate);
echo '</pre>';
echo '<br>Итоговая стоимость: ' . $rate->getPrice() . '<hr>';


echo '<h2>Тариф - Дневной</h2>';
$rate = new DaysRate();
$rate->hours = 182;
$rate->minutes = 54;
$rate->km = 25;
$rate->age = 19;
$rate->add_driver = true;
$rate->add_gps = true;

echo '<pre>';
print_r($rate);
echo '</pre>';
echo '<br>Итоговая стоимость: ' . $rate->getPrice() . '<hr>';


echo '<h2>Тариф - Студенческий</h2>';
$rate = new StudentsRate();
$rate->hours = 24;
$rate->minutes = 30;
$rate->km = 25;
$rate->age = 19;
$rate->add_gps = true;

echo '<pre>';
print_r($rate);
echo '</pre>';
echo '<br>Итоговая стоимость: ' . $rate->getPrice() . '<hr>';