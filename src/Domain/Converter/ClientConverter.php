<?php

declare(strict_types=1);

namespace App\Domain\Converter;

use App\Domain\Model\Client;
use App\Infrastructure\Entity\Client as ClientEntity;

final class ClientConverter implements ClientConverterInterface
{
    public function toEntity(Client $client): ClientEntity
    {
        $result = new ClientEntity();

        $result->setFirstName($client->getFirstName());
        $result->setLastName($client->getLastName());
        $result->setPhone($client->getPhone());

        return $result;
    }

    public function fromEntity(ClientEntity $client): Client
    {
        return new Client(
            $client->getFirstName(),
            $client->getLastName(),
            $client->getPhone()
        );
    }
}
