<?php

declare(strict_types=1);

namespace App\Tests\Domain\Collection;

use App\Domain\Collection\ReservationIntervalsCollection;
use App\Domain\Model\ReservationInterval;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;

/**
 * @internal
 * @covers \App\Domain\Collection\ReservationIntervalsCollection
 */
class ReservationIntervalsCollectionTest extends TestCase
{
    public function testAddInterval(): void
    {
        $collection = new ReservationIntervalsCollection();
        static::assertSame([], $collection->getIntervals());

        $afterAdd = [
            '10:00-11:00' => new ReservationInterval('10:00', '11:00', true),
        ];

        $collection->addInterval(new ReservationInterval('10:00', '11:00', true));
        static::assertEquals($afterAdd, $collection->getIntervals());
    }

    /**
     * @param ReservationIntervalsCollection $collection
     * @param array                          $expected
     *
     * @dataProvider provideCollection
     */
    public function testGetIntervals(ReservationIntervalsCollection $collection, array $expected): void
    {
        static::assertEquals($expected, $collection->getIntervals());
    }

    public function provideCollection(): ?\Generator
    {
        $collection1 = new ReservationIntervalsCollection();
        $collection2 = new ReservationIntervalsCollection();

        $collection2->addInterval(new ReservationInterval('10:00', '11:00', true));
        $collection2->addInterval(new ReservationInterval('11:00', '12:00', false));

        yield[
            $collection1,
            [],
        ];

        yield[
            $collection2,
            [
                '10:00-11:00' => new ReservationInterval('10:00', '11:00', true),
                '11:00-12:00' => new ReservationInterval('11:00', '12:00', false),
            ],
        ];
    }
}
