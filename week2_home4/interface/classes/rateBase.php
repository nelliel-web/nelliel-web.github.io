<?php
require_once 'interface/classes/rate.php';

class rateBase
{
    private $price_by_km = 10;
    private $price_by_time = 3;
    private $numeric_by_minute = 1;

    public $number_of_minutes = 0;
    public $number_of_km = 0;

    public function getPrice(){
        return
            ($this->price_by_km * $this->number_of_km) +
            ($this->numeric_by_minute * $this->price_by_time * $this->number_of_minutes);
    }
}