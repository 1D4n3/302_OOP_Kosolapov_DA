<?php

namespace App;

class Food implements Hotel
{
    protected $hotel;
    public function __construct(Hotel $hotel)
    {
        $this->hotel = $hotel;
    }
    public function getCost()
    {
        return $this->hotel->getCost() + 300;
    }
    public function getDescription()
    {
        return $this->hotel->getDescription() . ' + Food';
    }
}