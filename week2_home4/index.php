<?php
require_once('interface/iCarsharing.php');
require_once('interface/classes/rate.php');
require_once('interface/classes/rateBase.php');
require_once('interface/classes/rateHours.php');
require_once('interface/classes/rateDays.php');
require_once('interface/classes/rateStudents.php');


echo '<h2>Тариф - Базовый</h2>';
$rate = new rateBase();
$rate->number_of_hours = 1;
$rate->number_of_minutes = 0;
$rate->number_of_km = 5;
$rate->age = 19;
//$rate->add_driver = true;
$rate->add_gps = ['hours' => 3, 'minutes' => 5];

echo '<pre>';
print_r($rate);
echo '</pre>';
echo '<br>Итоговая стоимость: ' . $rate->getPrice() . '<hr>';


echo '<h2>Тариф - Почасовой</h2>';
$rate = new rateHours();
$rate->number_of_hours = 1;
$rate->number_of_minutes = 0;
$rate->number_of_km = 5;
$rate->age = 19;
$rate->add_driver = true;
$rate->add_gps = ['hours' => 3, 'minutes' => 5];

echo '<pre>';
print_r($rate);
echo '</pre>';
echo '<br>Итоговая стоимость: ' . $rate->getPrice() . '<hr>';


echo '<h2>Тариф - Дневной</h2>';
$rate = new rateDays();
$rate->number_of_hours = 1;
$rate->number_of_minutes = 0;
$rate->number_of_km = 5;
$rate->age = 19;
$rate->add_driver = true;
$rate->add_gps = ['hours' => 3, 'minutes' => 5];

echo '<pre>';
print_r($rate);
echo '</pre>';
echo '<br>Итоговая стоимость: ' . $rate->getPrice() . '<hr>';


echo '<h2>Тариф - Студенческий</h2>';
$rate = new rateStudents();
$rate->number_of_hours = 1;
$rate->number_of_minutes = 0;
$rate->number_of_km = 5;
$rate->age = 19;
//$rate->add_driver = true;
$rate->add_gps = ['hours' => 3, 'minutes' => 5];

echo '<pre>';
print_r($rate);
echo '</pre>';
echo '<br>Итоговая стоимость: ' . $rate->getPrice() . '<hr>';