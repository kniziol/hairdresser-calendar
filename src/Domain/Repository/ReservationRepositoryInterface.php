<?php

declare(strict_types=1);

namespace App\Domain\Repository;

use App\Domain\Collection\ReservationIntervalsCollection;
use App\Domain\Model\Reservation;

interface ReservationRepositoryInterface
{
    public function findAllByDate(\DateTimeInterface $date): ReservationIntervalsCollection;

    public function save(Reservation $reservation): bool;
}
