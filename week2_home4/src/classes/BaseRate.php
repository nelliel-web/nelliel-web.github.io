<?php

class BaseRate extends A_Rate
{
    use GPS;

    protected $price_by_km = 10;
    protected $price_by_time = 3;
    protected $numeric_by_time = 1;


    public function getPrice()
    {
        $this->add_gps === true ? $price_gps = $this->addGPS($this->getMinutesOfDrive()) : $price_gps = 0;
        return parent::getPrice() + $price_gps;
    }

    public function getCorrectTime()
    {
        return $this->getMinutesOfDrive() / $this->numeric_by_time;
    }

}