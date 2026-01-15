<?php

/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

declare(strict_types=1);

namespace OxidSupport\Heartbeat\Tests\Unit\Component\ApiUser\Exception;

use OxidSupport\Heartbeat\Component\ApiUser\Exception\SetupNotAvailableException;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(SetupNotAvailableException::class)]
final class SetupNotAvailableExceptionTest extends TestCase
{
    public function testExceptionMessage(): void
    {
        $exception = new SetupNotAvailableException();

        $this->assertEquals('API user setup is not available. No setup token exists.', $exception->getMessage());
    }

    public function testGetCategoryReturnsPermission(): void
    {
        $exception = new SetupNotAvailableException();

        $this->assertEquals('permission', $exception->getCategory());
    }

    public function testClassIsFinal(): void
    {
        $reflection = new \ReflectionClass(SetupNotAvailableException::class);

        $this->assertTrue($reflection->isFinal());
    }

    public function testConstructorHasNoParameters(): void
    {
        $reflection = new \ReflectionClass(SetupNotAvailableException::class);
        $constructor = $reflection->getConstructor();

        $this->assertNotNull($constructor);
        $this->assertCount(0, $constructor->getParameters());
    }

    public function testCanBeThrownAndCaught(): void
    {
        $this->expectException(SetupNotAvailableException::class);

        throw new SetupNotAvailableException();
    }
}
