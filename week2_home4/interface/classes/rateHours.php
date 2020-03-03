<?php
require_once 'interface/classes/rate.php';

class rateHours
{
    private $price_by_km = 1;
    private $price_by_time = 200;
    private $numeric_by_minute = 60;

    public $number_of_minutes = 0;
    public $number_of_km = 0;

    public function getPrice()
    {
        if ($this->number_of_minutes % 60 >= 1) {
            $this->number_of_minutes = round($this->number_of_minutes);
        }
        return
            ($this->price_by_km * $this->number_of_km) +
            ($this->numeric_by_minute * $this->price_by_time * $this->number_of_minutes);
    }
}
