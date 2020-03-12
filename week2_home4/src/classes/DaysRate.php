<?php

class DaysRate extends A_Rate
{
    use GPS;
    use Driver;

    protected $price_by_km = 1;
    protected $price_by_time = 1000;
    protected $numeric_by_time = 24;


    public function getPrice()
    {
        $this->add_gps === true ? $price_gps = $this->addGPS($this->getMinutesOfDrive()) : $price_gps = 0;
        $this->add_driver === true ? $price_driver = $this->addDriver() : $price_driver = 0;
        return parent::getPrice() + $price_gps + $price_driver;
    }

    public function getCorrectTime()
    {
        $days = floor($this->getMinutesOfDrive() / 60 / 24);
        $days_minus = 1;
        if ($days === 0) {
            $days = 1;
            $days_minus = 0;
        }
        return ceil(($this->getMinutesOfDrive() + (30 * ($days - $days_minus))) / ($this->numeric_by_time * 60 + 30));
    }
}