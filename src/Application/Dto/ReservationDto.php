<?php

declare(strict_types=1);

namespace App\Application\Dto;

final class ReservationDto implements ReservationDtoInterface
{
    /** @var string */
    private $firstName;

    /** @var string */
    private $lastName;

    /** @var string */
    private $phone;

    /** @var int */
    private $chair;

    /** @var string */
    private $startDate;

    /** @var string */
    private $endDate;

    public function __construct(
        string $firstName,
        string $lastName,
        string $phone,
        int $chair,
        string $startDate,
        string $endDate
    ) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->phone = $phone;
        $this->chair = $chair;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function getChair(): int
    {
        return $this->chair;
    }

    public function getStartDate(): string
    {
        return $this->startDate;
    }

    public function getEndDate(): string
    {
        return $this->endDate;
    }
}
