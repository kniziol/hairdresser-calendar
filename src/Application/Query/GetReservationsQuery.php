<?php

declare(strict_types=1);

namespace App\Application\Query;

use DateTimeInterface;

final class GetReservationsQuery
{
    /** @var DateTimeInterface */
    private $date;

    public function __construct(DateTimeInterface $date)
    {
        $this->date = $date;
    }

    public function getDate(): DateTimeInterface
    {
        return $this->date;
    }
}
