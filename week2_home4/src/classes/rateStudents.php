<?php

class rateStudents
{

    use GPS;

    private $price_by_km = 4;
    private $price_by_time = 1;
    private $numeric_by_time = 1;

    public $number_of_minutes = 0;
    public $number_of_hours = 0;
    public $number_of_km = 0;
    public $age = '';

    public $add_gps = '';
    private $add_driver = false;


    public function getPrice()
    {
        $price_gps = $this->addGPS($this->add_gps);
        $price_driver = $this->addDriver($this->add_driver);

        if (!empty($this->age) and $this->age < 26 and $this->age > 17) {
            $number_of_time = $this->getCorrectTime();
            return ($this->price_by_km * $this->number_of_km) + $this->price_by_time * $number_of_time + ($price_gps + $price_driver);
        } else {
            return false;
        }
    }

    private function getCorrectTime()
    {
        return ($this->number_of_hours * 60 + $this->number_of_minutes) / $this->numeric_by_time;
    }
}