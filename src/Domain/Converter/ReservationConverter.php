<?php

declare(strict_types=1);

namespace App\Domain\Converter;

use App\Domain\Model\Reservation;
use App\Infrastructure\Entity\Reservation as ReservationEntity;

final class ReservationConverter implements ReservationConverterInterface
{
    /** @var ClientConverterInterface */
    private $clientConverter;

    /** @var ChairConverterInterface */
    private $chairConverter;

    public function __construct(ClientConverterInterface $clientConverter, ChairConverterInterface $chairConverter)
    {
        $this->clientConverter = $clientConverter;
        $this->chairConverter = $chairConverter;
    }

    public function toEntity(Reservation $reservation): ReservationEntity
    {
        $result = new ReservationEntity();

        $result->setStartDate($reservation->getStartDate());
        $result->setEndDate($reservation->getEndDate());

        $client = $this->clientConverter->toEntity($reservation->getClient());
        $result->setClient($client);

        $chair = $this->chairConverter->toEntity($reservation->getChair());
        $result->setChair($chair);

        return $result;
    }

    public function fromEntity(ReservationEntity $reservation): Reservation
    {
        $client = $this->clientConverter->fromEntity($reservation->getClient());
        $chair = $this->chairConverter->fromEntity($reservation->getChair());

        return new Reservation(
            $client,
            $chair,
            $reservation->getStartDate(),
            $reservation->getEndDate()
        );
    }
}
