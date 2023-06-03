<?php

namespace App;

class Dinner implements Hotel
{
    protected $hotel;
    public function __construct(Hotel $hotel)
    {
        $this->hotel = $hotel;
    }
    public function getCost()
    {
        return $this->hotel->getCost() + 800;
    }
    public function getDescription()
    {
        return $this->hotel->getDescription() . ' + Dinner';
    }
}