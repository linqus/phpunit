<?php

namespace App\Tests\Unit\Entity;

use App\Entity\Dinosaur;
use App\Enum\HealthStatus;
use Generator;
use PHPUnit\Framework\TestCase;

class DinosaurTest extends TestCase
{

    public function testCanGetAndSetData(): void
    {

        $dino = new Dinosaur('Big Eaty','Tyrannosaurus',15,'Paddock A');

        self::assertSame('Big Eaty', $dino->getName());
        self::assertSame('Tyrannosaurus', $dino->getGenus());
        self::assertSame(15, $dino->getLength());
        self::assertSame('Paddock A', $dino->getEnclosure());        

    }

    /**
     *  @dataProvider sizeDescriptionProvider
     */
    public function testDinoHasCorrectSizeDescriptionFromLength(int $length, string $expectedSize): void 
    {
        $dino = new Dinosaur(name: 'Big Eaty', length: $length);

        self::assertSame($expectedSize, $dino->getSizeDescription());
    }


    public function sizeDescriptionProvider(): Generator
    {
        yield '10 Meter Large Dino' => [10, 'Large'];
        yield '5 Meter Medium Dino' => [5, 'Medium'];
        yield '4 Meter Small Dino' => [4, 'Small'];
    }

    public function testIsAcceptingVisitorsByDefault(): void
    {
        $dino = new Dinosaur('Dennis');

        self::assertTrue($dino->isAcceptingVisitors());


    }

    /** 
     * @dataProvider healthStatusProvider
     */
    public function testIsAcceptingVisitorsBasedOnHealthStatus(HealthStatus $healthStatus, $shouldAcceptVisitors): void
    {
        $dino = new Dinosaur('Bumpy');
        $dino->setHealth($healthStatus);

        self::assertSame($shouldAcceptVisitors,$dino->isAcceptingVisitors());
    }

    public function healthStatusProvider(): Generator
    {
        yield 'Sick dino is not accepting visitors' => [HealthStatus::SICK, false];
        yield 'Healthy dino is accepting visitors' => [HealthStatus::HEALTHY, true];
        yield "Hungry dino is accepting visitors" => [HealthStatus::HUNGRY, true];
    }
}