<?php

declare(strict_types=1);

namespace App\Domain\Converter;

use App\Domain\Model\Chair;
use App\Infrastructure\Entity\Chair as ChairEntity;

interface ChairConverterInterface
{
    public function toEntity(Chair $chair): ChairEntity;

    public function fromEntity(ChairEntity $chair): Chair;
}
