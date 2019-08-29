<?php

declare(strict_types=1);

namespace App\Tests\Application\Query;

use App\Application\Query\GetReservationsHandler;
use App\Application\Query\GetReservationsQuery;
use App\Domain\Collection\ReservationIntervalsCollection;
use App\Domain\Model\ReservationInterval;
use App\Domain\Repository\ReservationRepositoryInterface;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;

/**
 * @internal
 * @covers \App\Application\Query\GetReservationsHandler
 */
class GetReservationsHandlerTest extends TestCase
{
    public function testInvoke(): void
    {
        $repository = $this->createMock(ReservationRepositoryInterface::class);

        $result = new ReservationIntervalsCollection();
        $result->addInterval(new ReservationInterval('10:00', '11:00', false));
        $result->addInterval(new ReservationInterval('12:00', '13:00', false));

        $repository
            ->expects(static::once())
            ->method('findAllByDate')
            ->willReturn($result)
        ;

        $handler = new GetReservationsHandler($repository);
        $query = new GetReservationsQuery(new \DateTime());

        static::assertSame($result, $handler($query));
    }
}
