<?php

declare(strict_types=1);

namespace App\Application\Dto;

interface ReservationDtoInterface
{
    public function getFirstName(): string;

    public function getLastName(): string;

    public function getPhone(): string;

    public function getChair(): int;

    public function getStartDate(): string;

    public function getEndDate(): string;
}
