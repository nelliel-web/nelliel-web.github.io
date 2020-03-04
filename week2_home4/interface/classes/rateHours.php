<?php
require_once 'interface/classes/rate.php';

class rateHours
{
    use Services;

    private $price_by_km = 0;
    private $price_by_time = 200;
    private $numeric_by_time = 60;

    public $number_of_minutes = 0;
    public $number_of_hours = 0;
    public $number_of_km = 0;
    public $age = '';


    public $add_gps = '';
    public $add_driver = false;


    public function getPrice()
    {
        $price_gps = $this->addGPS($this->add_gps);
        $price_driver = $this->addDriver($this->add_driver);

        $number_of_time = $this->getCorrectTime();
        return $this->price_by_time * $number_of_time + ($price_gps + $price_driver);
    }

    private function getCorrectTime()
    {
        $minutes = $this->number_of_hours * 60 + $this->number_of_minutes;
        return ceil($minutes / $this->numeric_by_time);
    }
}
