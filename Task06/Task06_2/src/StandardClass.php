<?php

namespace App;

class StandardClass implements Hotel
{
    public function getCost()
    {
        return 2000;
    }
    public function getDescription()
    {
        return 'Standard class';
    }
}