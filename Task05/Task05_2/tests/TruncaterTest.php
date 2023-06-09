<?php

namespace Tests;

use App\Truncater;
use PHPUnit\Framework\TestCase;

class TruncaterTest extends TestCase
{
    public function testTruncate()
    {
        $defaultTruncater = new Truncater();
        $this->assertSame("Косолапов Даниил Алексеевич", $defaultTruncater->truncate("Косолапов Даниил Алексеевич"));
        $this->assertSame("Косолапов ...", $defaultTruncater->truncate("Косолапов Даниил Алексеевич", ['length' => 10]));
        $this->assertSame("Косолапов Дан...", $defaultTruncater->truncate("Косолапов Даниил Алексеевич",['length' => -13]));
        $this->assertSame("Косолапов *", $defaultTruncater->truncate("Косолапов Даниил Алексеевич",['length' => 10, 'separator' => '*']));
        $this->assertSame("Косолапов Даниил Алексеевич", $defaultTruncater->truncate("Косолапов Даниил Алексеевич"));

        $overriddenTruncater1 = new Truncater(['length' => 16]);
        $this->assertSame("Косолапов Даниил...", $overriddenTruncater1->truncate("Косолапов Даниил Алексеевич"));
        $this->assertSame("Косолапов Даниил**", $overriddenTruncater1->truncate("Косолапов Даниил Алексеевич", ['separator' => '**']));

        //$overriddenTruncater2 = new Truncater(['length' => 16, 'separator' => '\\\']);
        //$this->assertSame("Косолапов Даниил\\\", $overriddenTruncater2->truncate("Косолапов Даниил Алексеевич"));
    }
}
