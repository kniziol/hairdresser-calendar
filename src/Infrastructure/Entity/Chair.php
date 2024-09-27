<?php

declare(strict_types=1);

namespace App\Infrastructure\Entity;

class Chair
{
    /** @var int */
    private $id;

    /** @var int */
    private $number;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(int $number): self
    {
        $this->number = $number;

        return $this;
    }
}
