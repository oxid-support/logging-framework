<?php

/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

declare(strict_types=1);

namespace OxidSupport\Heartbeat\Tests\Unit\Component\LogSender\Exception;

use OxidSupport\Heartbeat\Component\LogSender\Exception\LogSenderDisabledException;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(LogSenderDisabledException::class)]
final class LogSenderDisabledExceptionTest extends TestCase
{
    public function testExceptionMessage(): void
    {
        $exception = new LogSenderDisabledException();

        $this->assertEquals('Log Sender component is disabled.', $exception->getMessage());
    }

    public function testExtendsException(): void
    {
        $exception = new LogSenderDisabledException();

        $this->assertInstanceOf(\Exception::class, $exception);
    }

    public function testClassIsFinal(): void
    {
        $reflection = new \ReflectionClass(LogSenderDisabledException::class);

        $this->assertTrue($reflection->isFinal());
    }

    public function testConstructorHasNoParameters(): void
    {
        $reflection = new \ReflectionClass(LogSenderDisabledException::class);
        $constructor = $reflection->getConstructor();

        $this->assertNotNull($constructor);
        $this->assertCount(0, $constructor->getParameters());
    }

    public function testCanBeThrownAndCaught(): void
    {
        $this->expectException(LogSenderDisabledException::class);

        throw new LogSenderDisabledException();
    }

    public function testExceptionCodeIsZero(): void
    {
        $exception = new LogSenderDisabledException();

        $this->assertEquals(0, $exception->getCode());
    }
}
