<?php

/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

declare(strict_types=1);

namespace OxidSupport\Heartbeat\Tests\Unit\Component\ApiUser\Exception;

use OxidSupport\Heartbeat\Component\ApiUser\Exception\InvalidTokenException;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(InvalidTokenException::class)]
final class InvalidTokenExceptionTest extends TestCase
{
    public function testExceptionMessage(): void
    {
        $exception = new InvalidTokenException();

        $this->assertEquals('Invalid or expired setup token.', $exception->getMessage());
    }

    public function testGetCategoryReturnsPermission(): void
    {
        $exception = new InvalidTokenException();

        $this->assertEquals('permission', $exception->getCategory());
    }

    public function testClassIsFinal(): void
    {
        $reflection = new \ReflectionClass(InvalidTokenException::class);

        $this->assertTrue($reflection->isFinal());
    }

    public function testConstructorHasNoParameters(): void
    {
        $reflection = new \ReflectionClass(InvalidTokenException::class);
        $constructor = $reflection->getConstructor();

        $this->assertNotNull($constructor);
        $this->assertCount(0, $constructor->getParameters());
    }

    public function testCanBeThrownAndCaught(): void
    {
        $this->expectException(InvalidTokenException::class);

        throw new InvalidTokenException();
    }
}
