<?php

namespace App;

class LuxuryClass implements Hotel
{
    public function getCost()
    {
        return 3000;
    }
    public function getDescription()
    {
        return 'Luxury class';
    }
}