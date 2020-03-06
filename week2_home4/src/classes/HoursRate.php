<?php

class rateHours extends A_Rate
{
    use GPS;
    use Driver;

    protected $price_by_km = 0;
    protected $price_by_time = 200;
    protected $numeric_by_time = 60;

    public $minutes = 0;
    public $hours = 0;
    public $km = 0;
    public $age = '';

    public $add_gps = false;
    public $add_driver = false;


    public function getPrice()
    {
        $this->add_gps === true ? $price_gps = $this->addGPS($this->getMinutesOfDrive()) : $price_gps = 0;
        $this->add_driver === true ? $price_driver = $this->addDriver() : $price_driver = 0;
        return parent::getPrice() + $price_gps + $price_driver;
    }

    public function getCorrectTime()
    {
        return ceil($this->getMinutesOfDrive() / $this->numeric_by_time);
    }
}
