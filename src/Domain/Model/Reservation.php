<?php

declare(strict_types=1);

namespace App\Domain\Model;

use DateTimeInterface;

final class Reservation
{
    /** @var Client */
    private $client;

    /** @var Chair */
    private $chair;

    /** @var DateTimeInterface */
    private $startDate;

    /** @var DateTimeInterface */
    private $endDate;

    public function __construct(Client $client, Chair $chair, DateTimeInterface $startDate, DateTimeInterface $endDate)
    {
        $this->client = $client;
        $this->chair = $chair;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function getClient(): Client
    {
        return $this->client;
    }

    public function getChair(): Chair
    {
        return $this->chair;
    }

    public function getStartDate(): DateTimeInterface
    {
        return $this->startDate;
    }

    public function getEndDate(): DateTimeInterface
    {
        return $this->endDate;
    }
}
