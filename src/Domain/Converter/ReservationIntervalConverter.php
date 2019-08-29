<?php

declare(strict_types=1);

namespace App\Domain\Converter;

use App\Common\DateFormat;
use App\Domain\Model\ReservationInterval;
use App\Infrastructure\Entity\Reservation as ReservationEntity;

final class ReservationIntervalConverter implements ReservationIntervalConverterInterface
{
    public function fromReservationEntity(ReservationEntity $reservation): ReservationInterval
    {
        $startHour = '';
        $endHour = '';

        if (null !== $reservation->getStartDate()) {
            $startHour = $reservation->getStartDate()->format(DateFormat::TIME_ONLY);
        }

        if (null !== $reservation->getEndDate()) {
            $endHour = $reservation->getEndDate()->format(DateFormat::TIME_ONLY);
        }

        return new ReservationInterval($startHour, $endHour, true);
    }
}
