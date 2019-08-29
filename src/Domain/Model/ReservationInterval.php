<?php

declare(strict_types=1);

namespace App\Domain\Model;

final class ReservationInterval
{
    public const INTERVAL_DURATION_MINUTES = 30;

    /** @var string */
    private $startHour;

    /** @var string */
    private $endHour;

    /** @var bool */
    private $reserved;

    public function __construct(string $startHour, string $endHour, bool $reserved)
    {
        $this->startHour = $startHour;
        $this->endHour = $endHour;
        $this->reserved = $reserved;
    }

    public function getStartHour(): string
    {
        return $this->startHour;
    }

    public function getEndHour(): string
    {
        return $this->endHour;
    }

    public function isReserved(): bool
    {
        return $this->reserved;
    }
}
