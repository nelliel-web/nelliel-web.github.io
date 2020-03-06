<?php

trait GPS
{
    private function addGPS($time)
    {
        return ceil($time / 60) * 15;
    }
}

trait Driver
{
    private function addDriver()
    {
        return 100;
    }
}