<?php

declare(strict_types=1);

namespace App\Tests\Domain\Converter;

use App\Domain\Converter\ClientConverterInterface;
use App\Domain\Model\Client;
use App\Infrastructure\Entity\Client as ClientEntity;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * @internal
 * @covers \App\Domain\Converter\ClientConverter
 */
class ClientConverterTest extends KernelTestCase
{
    public function testFromEntity(): void
    {
        $client = new ClientEntity();
        $client->setFirstName('test 1');
        $client->setLastName('test 2');
        $client->setPhone('1234');

        $expected = new Client('test 1', 'test 2', '1234');
        $converter = static::$container->get(ClientConverterInterface::class);

        static::assertEquals($expected, $converter->fromEntity($client));
    }

    public function testToEntity(): void
    {
        $client = new Client('test 1', 'test 2', '1234');

        $expected = new ClientEntity();
        $expected->setFirstName('test 1');
        $expected->setLastName('test 2');
        $expected->setPhone('1234');

        $converter = static::$container->get(ClientConverterInterface::class);
        static::assertEquals($expected, $converter->toEntity($client));
    }

    protected function setUp(): void
    {
        parent::setUp();
        static::bootKernel();
    }
}
