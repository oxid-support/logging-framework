<?php

/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

declare(strict_types=1);

namespace OxidSupport\Heartbeat\Tests\Unit\Component\LogSender\Controller\GraphQL;

use OxidSupport\Heartbeat\Component\LogSender\Controller\GraphQL\LogController;
use OxidSupport\Heartbeat\Component\LogSender\DataType\LogContentType;
use OxidSupport\Heartbeat\Component\LogSender\DataType\LogSourceType;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

#[CoversClass(LogController::class)]
final class LogControllerTest extends TestCase
{
    public function testClassIsFinal(): void
    {
        $reflection = new ReflectionClass(LogController::class);

        $this->assertTrue($reflection->isFinal());
    }

    public function testLogSenderSourcesMethodExists(): void
    {
        $reflection = new ReflectionClass(LogController::class);

        $this->assertTrue($reflection->hasMethod('logSenderSources'));
    }

    public function testLogSenderContentMethodExists(): void
    {
        $reflection = new ReflectionClass(LogController::class);

        $this->assertTrue($reflection->hasMethod('logSenderContent'));
    }

    public function testLogSenderSourcesIsPublic(): void
    {
        $reflection = new ReflectionClass(LogController::class);
        $method = $reflection->getMethod('logSenderSources');

        $this->assertTrue($method->isPublic());
    }

    public function testLogSenderContentIsPublic(): void
    {
        $reflection = new ReflectionClass(LogController::class);
        $method = $reflection->getMethod('logSenderContent');

        $this->assertTrue($method->isPublic());
    }

    public function testLogSenderSourcesReturnsArray(): void
    {
        $reflection = new ReflectionClass(LogController::class);
        $method = $reflection->getMethod('logSenderSources');
        $returnType = $method->getReturnType();

        $this->assertNotNull($returnType);
        $this->assertEquals('array', $returnType->getName());
    }

    public function testLogSenderContentReturnsLogContentType(): void
    {
        $reflection = new ReflectionClass(LogController::class);
        $method = $reflection->getMethod('logSenderContent');
        $returnType = $method->getReturnType();

        $this->assertNotNull($returnType);
        $this->assertEquals(LogContentType::class, $returnType->getName());
    }

    public function testLogSenderSourcesHasQueryAttribute(): void
    {
        $reflection = new ReflectionClass(LogController::class);
        $method = $reflection->getMethod('logSenderSources');
        $attributes = $method->getAttributes();

        $attributeNames = array_map(fn($a) => $a->getName(), $attributes);
        $this->assertContains('TheCodingMachine\GraphQLite\Annotations\Query', $attributeNames);
    }

    public function testLogSenderSourcesHasLoggedAttribute(): void
    {
        $reflection = new ReflectionClass(LogController::class);
        $method = $reflection->getMethod('logSenderSources');
        $attributes = $method->getAttributes();

        $attributeNames = array_map(fn($a) => $a->getName(), $attributes);
        $this->assertContains('TheCodingMachine\GraphQLite\Annotations\Logged', $attributeNames);
    }

    public function testLogSenderSourcesHasRightAttribute(): void
    {
        $reflection = new ReflectionClass(LogController::class);
        $method = $reflection->getMethod('logSenderSources');
        $attributes = $method->getAttributes();

        $attributeNames = array_map(fn($a) => $a->getName(), $attributes);
        $this->assertContains('TheCodingMachine\GraphQLite\Annotations\Right', $attributeNames);
    }

    public function testLogSenderContentHasQueryAttribute(): void
    {
        $reflection = new ReflectionClass(LogController::class);
        $method = $reflection->getMethod('logSenderContent');
        $attributes = $method->getAttributes();

        $attributeNames = array_map(fn($a) => $a->getName(), $attributes);
        $this->assertContains('TheCodingMachine\GraphQLite\Annotations\Query', $attributeNames);
    }

    public function testLogSenderContentHasLoggedAttribute(): void
    {
        $reflection = new ReflectionClass(LogController::class);
        $method = $reflection->getMethod('logSenderContent');
        $attributes = $method->getAttributes();

        $attributeNames = array_map(fn($a) => $a->getName(), $attributes);
        $this->assertContains('TheCodingMachine\GraphQLite\Annotations\Logged', $attributeNames);
    }

    public function testLogSenderContentHasRightAttribute(): void
    {
        $reflection = new ReflectionClass(LogController::class);
        $method = $reflection->getMethod('logSenderContent');
        $attributes = $method->getAttributes();

        $attributeNames = array_map(fn($a) => $a->getName(), $attributes);
        $this->assertContains('TheCodingMachine\GraphQLite\Annotations\Right', $attributeNames);
    }

    public function testLogSenderContentHasSourceIdParameter(): void
    {
        $reflection = new ReflectionClass(LogController::class);
        $method = $reflection->getMethod('logSenderContent');
        $parameters = $method->getParameters();

        $parameterNames = array_map(fn($p) => $p->getName(), $parameters);
        $this->assertContains('sourceId', $parameterNames);
    }

    public function testLogSenderContentHasMaxBytesParameter(): void
    {
        $reflection = new ReflectionClass(LogController::class);
        $method = $reflection->getMethod('logSenderContent');
        $parameters = $method->getParameters();

        $parameterNames = array_map(fn($p) => $p->getName(), $parameters);
        $this->assertContains('maxBytes', $parameterNames);
    }

    public function testLogSenderContentMaxBytesIsNullable(): void
    {
        $reflection = new ReflectionClass(LogController::class);
        $method = $reflection->getMethod('logSenderContent');
        $parameters = $method->getParameters();

        $maxBytesParam = null;
        foreach ($parameters as $param) {
            if ($param->getName() === 'maxBytes') {
                $maxBytesParam = $param;
                break;
            }
        }

        $this->assertNotNull($maxBytesParam);
        $this->assertTrue($maxBytesParam->allowsNull());
    }

    public function testLogSenderContentMaxBytesDefaultsToNull(): void
    {
        $reflection = new ReflectionClass(LogController::class);
        $method = $reflection->getMethod('logSenderContent');
        $parameters = $method->getParameters();

        $maxBytesParam = null;
        foreach ($parameters as $param) {
            if ($param->getName() === 'maxBytes') {
                $maxBytesParam = $param;
                break;
            }
        }

        $this->assertNotNull($maxBytesParam);
        $this->assertTrue($maxBytesParam->isDefaultValueAvailable());
        $this->assertNull($maxBytesParam->getDefaultValue());
    }

    public function testConstructorHasFourParameters(): void
    {
        $reflection = new ReflectionClass(LogController::class);
        $constructor = $reflection->getConstructor();

        $this->assertNotNull($constructor);
        $this->assertCount(4, $constructor->getParameters());
    }

    public function testGetEnabledSourceIdsIsPrivate(): void
    {
        $reflection = new ReflectionClass(LogController::class);
        $method = $reflection->getMethod('getEnabledSourceIds');

        $this->assertTrue($method->isPrivate());
    }
}
