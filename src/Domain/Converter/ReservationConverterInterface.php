<?php

declare(strict_types=1);

namespace App\Domain\Converter;

use App\Domain\Model\Reservation;
use App\Infrastructure\Entity\Reservation as ReservationEntity;

interface ReservationConverterInterface
{
    public function toEntity(Reservation $reservation): ReservationEntity;

    public function fromEntity(ReservationEntity $reservation): Reservation;
}
