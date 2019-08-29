<?php

declare(strict_types=1);

namespace App\Tests\Domain\Converter;

use App\Domain\Converter\ReservationConverterInterface;
use App\Domain\Model\Chair;
use App\Domain\Model\Client;
use App\Domain\Model\Reservation;
use App\Infrastructure\Entity\Chair as ChairEntity;
use App\Infrastructure\Entity\Client as ClientEntity;
use App\Infrastructure\Entity\Reservation as ReservationEntity;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * @internal
 * @covers \App\Domain\Converter\ReservationConverter
 */
class ReservationConverterTest extends KernelTestCase
{
    public function testToEntity(): void
    {
        $startDate = new \DateTime('2019-01-10 10:00');
        $endDate = new \DateTime('2019-01-10 11:00');

        $reservation = new Reservation(
            new Client('test 1', 'test 2', '1234'),
            new Chair(1),
            new \DateTime('2019-01-10 10:00'),
            new \DateTime('2019-01-10 11:00')
        );

        $client = new ClientEntity();
        $client->setFirstName('test 1');
        $client->setLastName('test 2');
        $client->setPhone('1234');

        $chair = new ChairEntity();
        $chair->setNumber(1);

        $expected = new ReservationEntity();
        $expected->setStartDate($startDate);
        $expected->setEndDate($endDate);
        $expected->setClient($client);
        $expected->setChair($chair);

        $converter = static::$container->get(ReservationConverterInterface::class);
        static::assertEquals($expected, $converter->toEntity($reservation));
    }

    public function testFromEntity(): void
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

        $expected = new Reservation(
            new Client('test 1', 'test 2', '1234'),
            new Chair(1),
            $reservation->getStartDate(),
            $reservation->getEndDate()
        );

        $converter = static::$container->get(ReservationConverterInterface::class);
        static::assertEquals($expected, $converter->fromEntity($reservation));
    }

    protected function setUp(): void
    {
        parent::setUp();
        static::bootKernel();
    }
}
