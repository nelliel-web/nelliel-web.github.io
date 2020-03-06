<?php

trait GPS
{
    public $add_gps = false;
    private function addGPS($time)
    {
        return ceil($time / 60) * 15;
    }
}

trait Driver
{
    public $add_driver = false;
    private function addDriver()
    {
        return 100;
    }
}