<?php

declare(strict_types=1);

namespace App\Tests\Application\Dto;

use App\Application\Dto\ReservationDto;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;

/**
 * @internal
 * @covers \App\Application\Dto\ReservationDto
 */
class ReservationDtoTest extends TestCase
{
    public function testGetFirstName(): void
    {
        $reservation = new ReservationDto('test', '', '', 1, '', '');
        static::assertSame('test', $reservation->getFirstName());
    }

    public function testGetLastName(): void
    {
        $reservation = new ReservationDto('', 'test', '', 1, '', '');
        static::assertSame('test', $reservation->getLastName());
    }

    public function testGetPhone(): void
    {
        $reservation = new \App\Application\Dto\ReservationDto('', '', 'test', 1, '', '');
        static::assertSame('test', $reservation->getPhone());
    }

    public function testGetChair(): void
    {
        $reservation = new ReservationDto('', '', '', 1, '', '');
        static::assertSame(1, $reservation->getChair());
    }

    public function testGetStartDate(): void
    {
        $startDate = '2019-01-10 08:00';
        $reservation = new ReservationDto('', '', '', 1, $startDate, '');

        static::assertSame($startDate, $reservation->getStartDate());
    }

    public function testGetEndDate(): void
    {
        $endDate = '2019-01-10 08:00';
        $reservation = new ReservationDto('', '', '', 1, '', $endDate);

        static::assertSame($endDate, $reservation->getEndDate());
    }
}
