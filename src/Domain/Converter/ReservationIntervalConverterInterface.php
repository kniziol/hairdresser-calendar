<?php

declare(strict_types=1);

namespace App\Domain\Converter;

use App\Domain\Model\ReservationInterval;
use App\Infrastructure\Entity\Reservation as ReservationEntity;

interface ReservationIntervalConverterInterface
{
    public function fromReservationEntity(ReservationEntity $reservation): ReservationInterval;
}
