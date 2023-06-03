<?php

use App\Hotel;
use App\EconomyClass;
use App\StandardClass;
use App\LuxuryClass;
use App\Internet;
use App\Sofa;
use App\Food;
use App\Buffet;
use App\Dinner;
use PHPUnit\Framework\TestCase;

class HotelTest extends TestCase
{
    static $economy;
    static $standard;
    static $luxury;
    public static function setUpBeforeClass(): void
    {
        self::$economy = new EconomyClass();
        self::$standard = new StandardClass();
        self::$luxury = new LuxuryClass();
    }

    public function testEconomyClass()
    {
        $this->assertSame(
            'Economy class',
            self::$economy->getDescription()
        );
        $this->assertSame(1000, self::$economy->getCost());
        self::$economy = new Internet(self::$economy);
        $this->assertSame(
            'Economy class + Internet',
            self::$economy->getDescription()
        );
        $this->assertSame(1100, self::$economy->getCost());
        self::$economy = new Food(self::$economy);
        $this->assertSame(
            'Economy class + Internet + Food',
            self::$economy->getDescription()
        );
        $this->assertSame(1400, self::$economy->getCost());
    }

    public function testStandardClass()
    {
        $this->assertSame(
            'Standard class',
            self::$standard->getDescription()
        );
        $this->assertSame(2000, self::$standard->getCost());
        self::$standard = new Sofa(self::$standard);
        $this->assertSame(
            'Standard class + Sofa',
            self::$standard->getDescription()
        );
        $this->assertSame(2500, self::$standard->getCost());
        self::$standard = new Buffet(self::$standard);
        $this->assertSame(
            'Standard class + Sofa + Buffet',
            self::$standard->getDescription()
        );
        $this->assertSame(3000, self::$standard->getCost());
    }

    public function testLuxuryClass()
    {
        $this->assertSame('Luxury class', self::$luxury->getDescription());
        $this->assertSame(3000, self::$luxury->getCost());
        self::$luxury = new Internet(self::$luxury);
        $this->assertSame(
            'Luxury class + Internet',
            self::$luxury->getDescription()
        );
        $this->assertSame(3100, self::$luxury->getCost());
        self::$luxury = new Food(self::$luxury);
        $this->assertSame(
            'Luxury class + Internet + Food',
            self::$luxury->getDescription()
        );
        $this->assertSame(3400, self::$luxury->getCost());
        self::$luxury = new Sofa(self::$luxury);
        $this->assertSame(
            'Luxury class + Internet + Food + Sofa',
            self::$luxury->getDescription()
        );
        $this->assertSame(3900, self::$luxury->getCost());
        self::$luxury = new Buffet(self::$luxury);
        $this->assertSame(
            'Luxury class + Internet + Food + Sofa + Buffet',
            self::$luxury->getDescription()
        );
        $this->assertSame(4400, self::$luxury->getCost());
        self::$luxury = new Dinner(self::$luxury);
        $this->assertSame(
            'Luxury class + Internet + Food + Sofa + Buffet + Dinner',
            self::$luxury->getDescription()
        );
        $this->assertSame(5200, self::$luxury->getCost());
    }
}