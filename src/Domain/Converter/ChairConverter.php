<?php

declare(strict_types=1);

namespace App\Domain\Converter;

use App\Domain\Model\Chair;
use App\Infrastructure\Entity\Chair as ChairEntity;

final class ChairConverter implements ChairConverterInterface
{
    public function toEntity(Chair $chair): ChairEntity
    {
        $result = new ChairEntity();
        $result->setNumber($chair->getNumber());

        return $result;
    }

    public function fromEntity(ChairEntity $chair): Chair
    {
        return new Chair(
            $chair->getNumber()
        );
    }
}
