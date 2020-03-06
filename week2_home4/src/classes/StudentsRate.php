<?php

class StudentsRate extends A_Rate
{

    use GPS;

    protected $price_by_km = 4;
    protected $price_by_time = 1;
    protected $numeric_by_time = 1;

    public $minutes = 0;
    public $hours = 0;
    public $km = 0;
    public $age = '';

    public $add_gps = false;


    public function getPrice()
    {
        if (!empty($this->age) and $this->age < 25) {
            $this->add_gps === true ? $price_gps = $this->addGPS($this->getMinutesOfDrive()) : $price_gps = 0;
            return parent::getPrice() + $price_gps;
        } else {
            return false;
        }
    }

    public function getCorrectTime()
    {
        return ceil($this->getMinutesOfDrive() / $this->numeric_by_time);
    }
}