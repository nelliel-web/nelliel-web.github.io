<?php

trait GPS
{
    public function addGPS($time)
    {
        return ceil($time / 60) * 15;
    }
}

trait Driver
{
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

    protected $minutes;   // кол-во минут
    protected $hours;     // кол-во часов
    protected $km;        // расстояние в км
    protected $age;                 // Возраст

    protected $add_gps = false;
    protected $add_driver = false;

    abstract public function getCorrectTime();

    public function getPrice()
    {
        if (!empty($this->age) and $this->age < 66 and $this->age > 17) {
            $coefficient = 1;
            if ($this->age < 22) {
                $coefficient = 1.1;
            }
            $number_of_time = $this->getCorrectTime();
            return (($this->price_by_km * $this->km) +
                   ($this->numeric_by_time * $this->price_by_time * $number_of_time)) * $coefficient;
        } else {
            return false;
        }
    }



}