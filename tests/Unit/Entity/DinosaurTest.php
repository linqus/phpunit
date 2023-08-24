<?php

namespace App\Tests\Unit\Entity;

use PHPUnit\Framework\TestCase;

class DinosaurTest extends TestCase
{

    public function testItWorks(): void
    {

        self::assertEquals(expected:42, actual:'42');
    }


    public function testItWorksTheSame(): void
    {
        self::assertSame(expected:42, actual:'42');
        //self::assertCount(expectedCount: 3, haystack:[1,2,3], message:'Yes!');
    }
}