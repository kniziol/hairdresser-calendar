<?php

declare(strict_types=1);

namespace App\Tests\Domain\Converter;

use App\Common\DateFormat;
use App\Domain\Converter\ReservationIntervalConverterInterface;
use App\Domain\Model\ReservationInterval;
use App\Infrastructure\Entity\Chair as ChairEntity;
use App\Infrastructure\Entity\Client as ClientEntity;
use App\Infrastructure\Entity\Reservation as ReservationEntity;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * @internal
 * @covers \App\Domain\Converter\ReservationIntervalConverter
 */
class ReservationIntervalConverterTest extends KernelTestCase
{
    public function testFromReservationEntity(): void
    {
        $startDate = new \DateTime('2019-01-10 10:00');
        $endDate = new \DateTime('2019-01-10 11:00');

        $client = new ClientEntity();
        $client->setFirstName('test 1');
        $client->setLastName('test 2');
        $client->setPhone('1234');

        $chair = new ChairEntity();
        $chair->setNumber(1);

        $reservation = new ReservationEntity();
        $reservation->setStartDate($startDate);
        $reservation->setEndDate($endDate);
        $reservation->setClient($client);
        $reservation->setChair($chair);

        $expected = new ReservationInterval(
            $startDate->format(DateFormat::TIME_ONLY),
            $endDate->format(DateFormat::TIME_ONLY),
            true
        );

        $converter = static::$container->get(ReservationIntervalConverterInterface::class);
        static::assertEquals($expected, $converter->fromReservationEntity($reservation));
    }

    protected function setUp(): void
    {
        parent::setUp();
        static::bootKernel();
    }
}
