<?php
require_once 'interface/iCarsharing.php';

trait Services
{
    public function addGPS($time)
    {
        if (is_array($time)) {
            return ceil(($time['hours'] * 60 + $time['minutes']) / 60) * 15;
        } else {
            return 0;
        }
    }

    public function addDriver(bool $bool)
    {
        if ($bool === true) {
            return 100;
        } else {
            return 0;
        }

    }
}


abstract class Rate implements iCarsharing
{
    private $price_by_km;       // Стоимость километра
    private $price_by_time;     // Стоимость единицу время
    private $numeric_by_time;   // Единица времени

    protected $number_of_minutes;   // кол-во минут
    protected $number_of_hours;     // кол-во часов
    protected $number_of_km;        // расстояние в км
    protected $age;                 // Возраст

    abstract public function getPrice();

    abstract public function getCorrectTime();

}