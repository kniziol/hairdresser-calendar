<?php

declare(strict_types=1);

namespace App\Domain\Converter;

use App\Domain\Model\Client;
use App\Infrastructure\Entity\Client as ClientEntity;

interface ClientConverterInterface
{
    public function toEntity(Client $client): ClientEntity;

    public function fromEntity(ClientEntity $client): Client;
}
