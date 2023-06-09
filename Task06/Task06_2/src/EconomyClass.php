<?php

namespace App;

class EconomyClass implements Hotel
{
    public function getCost()
    {
        return 1000;
    }
    public function getDescription()
    {
        return 'Economy class';
    }
}