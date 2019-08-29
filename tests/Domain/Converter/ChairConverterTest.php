<?php

declare(strict_types=1);

namespace App\Tests\Domain\Converter;

use App\Domain\Converter\ChairConverterInterface;
use App\Domain\Model\Chair;
use App\Infrastructure\Entity\Chair as ChairEntity;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * @internal
 * @covers \App\Domain\Converter\ChairConverter
 */
class ChairConverterTest extends KernelTestCase
{
    public function testToEntity(): void
    {
        $expected = new ChairEntity();
        $expected->setNumber(1);

        $chair = new Chair(1);
        $converter = static::$container->get(ChairConverterInterface::class);

        static::assertEquals($expected, $converter->toEntity($chair));
    }

    public function testFromEntity(): void
    {
        $chair = new ChairEntity();
        $chair->setNumber(1);

        $expected = new Chair(1);
        $converter = static::$container->get(ChairConverterInterface::class);

        static::assertEquals($expected, $converter->fromEntity($chair));
    }

    protected function setUp(): void
    {
        parent::setUp();
        static::bootKernel();
    }
}
