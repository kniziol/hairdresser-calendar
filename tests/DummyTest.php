<?php

declare(strict_types=1);

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Tests\TestCase;

/**
 * @internal
 * @coversNothing
 */
class DummyTest extends TestCase
{
    public function testDummy(): void
    {
        static::assertSame(1, 1);
    }
}
