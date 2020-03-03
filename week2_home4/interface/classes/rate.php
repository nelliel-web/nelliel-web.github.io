<?php
require_once 'interface/iCarsharing.php';


abstract class Rate implements iCarsharing
{
    private $price_by_km;       // Стоимость километра
    private $price_by_time;     // Стоимость единицу время
    private $numeric_by_minute; // Единица времени

    abstract public function getPrice();
}