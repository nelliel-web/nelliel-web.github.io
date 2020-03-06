<?php

abstract class A_Rate implements I_Carsharing
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
        $time = $this->getCorrectTime();
        $km = $this->km;
        $age = $this->age;
        $coefficient = 1;

        if (!empty($age) and $age < 66 and $age > 17) {
            if ($age < 22) {
                $coefficient = 1.1;
            }
            return (($price_by_km * $km) + ($price_by_time * $time)) * $coefficient;
        } else {
            return false;
        }
    }

    public function getMinutesOfDrive()
    {
        return $this->hours * 60 + $this->minutes;
    }


}