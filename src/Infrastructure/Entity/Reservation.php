<?php

declare(strict_types=1);

namespace App\Infrastructure\Entity;

use DateTimeInterface;

class Reservation
{
    /** @var int */
    private $id;

    /** @var DateTimeInterface */
    private $startDate;

    /** @var DateTimeInterface */
    private $endDate;

    /** @var Client */
    private $client;

    /** @var Chair */
    private $chair;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStartDate(): ?DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(DateTimeInterface $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): ?DateTimeInterface
    {
        return $this->endDate;
    }

    public function setEndDate(DateTimeInterface $endDate): self
    {
        $this->endDate = $endDate;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getChair(): ?Chair
    {
        return $this->chair;
    }

    public function setChair(?Chair $chair): self
    {
        $this->chair = $chair;

        return $this;
    }
}
