<?php

trait GPS
{
    private function addGPS($time)
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

    protected $price_by_km;
    protected $price_by_time;
    protected $numeric_by_time;

    protected $minutes;
    protected $hours;
    protected $km;
    protected $age;


    abstract public function getCorrectTime();


    public function getPrice()
    {
        $price_by_km = $this->price_by_km;
        $price_by_time = $this->price_by_time;
        $numeric_by_time = $this->numeric_by_time;
        $time = $this->getCorrectTime();
        $km = $this->km;
        $age = $this->age;
        $coefficient = 1;

        if (!empty($age) and $age < 66 and $age > 17) {
            if ($age < 22) {
                $coefficient = 1.1;
            }
            return (($price_by_km * $km) + ($numeric_by_time * $price_by_time * $time)) * $coefficient;
        } else {
            return false;
        }
    }


}