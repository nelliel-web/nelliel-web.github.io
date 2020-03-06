<?php

class rateBase extends rate
{
    use GPS;

    private $price_by_km = 10;
    private $price_by_time = 3;
    private $numeric_by_time = 1;

    public $number_of_minutes = 0;
    public $number_of_hours = 0;
    public $number_of_km = 0;
    public $age = '';


    public $add_gps = false;


    public function getPrice()
    {
        parent::getPrice();
    }

    public function getCorrectTime()
    {
        return $this->number_of_hours * 60 + $this->number_of_minutes;
    }


}