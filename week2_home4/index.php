<?php
require_once('interface/iCarsharing.php');
require_once('interface/classes/rate.php');
require_once('interface/classes/rateBase.php');

$rate_base = new rateBase();
$rate_base->number_of_minutes = 30;
$rate_base->number_of_km = 45;
echo '<pre>';
print_r($rate_base);
echo $rate_base->getPrice();
