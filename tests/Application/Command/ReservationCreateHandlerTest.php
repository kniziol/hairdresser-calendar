<?php

declare(strict_types=1);

namespace App\Tests\Application\Command;

use App\Application\Command\ReservationCreateCommand;
use App\Application\Command\ReservationCreateHandler;
use App\Domain\Collection\ReservationIntervalsCollection;
use App\Domain\Model\ReservationInterval;
use App\Domain\Repository\ReservationRepositoryInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * @internal
 * @covers \App\Application\Command\ReservationCreateHandler
 */
class ReservationCreateHandlerTest extends KernelTestCase
{
    public function testInvoke(): void
    {
        $repository = $this->createMock(ReservationRepositoryInterface::class);

        $repository
            ->expects(static::once())
            ->method('save')
            ->willReturn(true)
        ;

        $command = new ReservationCreateCommand(
            'test 1',
            'test 2',
            'test 3',
            1,
            '2019-01-10 10:00',
            '2019-01-10 11:00'
        );

        $handler = new ReservationCreateHandler($repository);
        $handler($command);

        $result = new ReservationIntervalsCollection();
        $result->addInterval(new ReservationInterval('10:00', '11:00', false));
        $result->addInterval(new ReservationInterval('12:00', '13:00', false));

        $repository
            ->expects(static::once())
            ->method('findAllByDate')
            ->willReturn($result)
        ;

        static::assertSame($result, $repository->findAllByDate(new \DateTime('2019-01-10')));
    }
}
