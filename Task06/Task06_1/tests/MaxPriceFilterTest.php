<?php

namespace App\Tests;

use App\Product;
use App\ProductCollection;
use App\ProductFilteringStrategy;
use App\MaxPriceFilter;
use PHPUnit\Framework\TestCase;

class MaxPriceFilterTest extends TestCase
{
    static $collection;
    public static function setUpBeforeClass(): void
    {
        $p1 = new Product();
        $p1->name = 'Шоколад';
        $p1->listPrice = 100;
        $p1->sellingPrice = 50;
        $p1->manufacturer = 'Красный Октябрь';

        $p2 = new Product();
        $p2->name = 'Мармелад';
        $p2->listPrice = 100;
        $p2->manufacturer = 'Ламзурь';

        self::$collection = new ProductCollection([$p1, $p2]);
    }
    public function testManufacturerFilter()
    {
        $this->assertSame(2, count(self::$collection->getProductsArray()));
        self::$collection = self::$collection->filter(new MaxPriceFilter(50));
        $this->assertSame(1, count(self::$collection->getProductsArray()));
        $productsArray = self::$collection->getProductsArray();
        $this->assertSame('Шоколад', $productsArray[0]->name);
    }
}