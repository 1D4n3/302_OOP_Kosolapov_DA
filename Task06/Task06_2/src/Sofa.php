<?php

namespace App;

class Sofa implements Hotel
{
    protected $hotel;
    public function __construct(Hotel $hotel)
    {
        $this->hotel = $hotel;
    }
    public function getCost()
    {
        return $this->hotel->getCost() + 500;
    }
    public function getDescription()
    {
        return $this->hotel->getDescription() . ' + Sofa';
    }
}