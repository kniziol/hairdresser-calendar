<?php

declare(strict_types=1);

namespace App\Tests;

use PHPUnit\Framework\TestCase;

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
