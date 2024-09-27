<?php

declare(strict_types=1);

namespace App\Domain\Collection;

use App\Domain\Model\ReservationInterval;

final class ReservationIntervalsCollection
{
    /** @var array */
    private $intervals = [];

    /**
     * @return ReservationInterval[]
     */
    public function getIntervals(): array
    {
        return $this->intervals;
    }

    public function addInterval(ReservationInterval $interval): void
    {
        $index = static::createIndex($interval);
        $this->intervals[$index] = $interval;
    }

    private static function createIndex(ReservationInterval $interval): string
    {
        return sprintf('%s-%s', $interval->getStartHour(), $interval->getEndHour());
    }
}
