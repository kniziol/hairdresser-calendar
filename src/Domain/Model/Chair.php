<?php

declare(strict_types=1);

namespace App\Domain\Model;

final class Chair
{
    /** @var int */
    private $number;

    public function __construct(int $number)
    {
        $this->number = $number;
    }

    public function getNumber(): int
    {
        return $this->number;
    }
}
