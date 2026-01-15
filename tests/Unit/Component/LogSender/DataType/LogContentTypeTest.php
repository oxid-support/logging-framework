<?php

/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

declare(strict_types=1);

namespace OxidSupport\Heartbeat\Tests\Unit\Component\LogSender\DataType;

use OxidSupport\Heartbeat\Component\LogSender\DataType\LogContentType;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(LogContentType::class)]
final class LogContentTypeTest extends TestCase
{
    public function testGetSourceIdReturnsCorrectValue(): void
    {
        $type = new LogContentType(
            'source-123',
            'Test Source',
            '/var/log/test.log',
            'log content',
            1024,
            1234567890,
            false
        );

        $this->assertEquals('source-123', $type->getSourceId());
    }

    public function testGetSourceNameReturnsCorrectValue(): void
    {
        $type = new LogContentType(
            'source-123',
            'Test Source',
            '/var/log/test.log',
            'log content',
            1024,
            1234567890,
            false
        );

        $this->assertEquals('Test Source', $type->getSourceName());
    }

    public function testGetPathReturnsCorrectValue(): void
    {
        $type = new LogContentType(
            'source-123',
            'Test Source',
            '/var/log/test.log',
            'log content',
            1024,
            1234567890,
            false
        );

        $this->assertEquals('/var/log/test.log', $type->getPath());
    }

    public function testGetContentReturnsCorrectValue(): void
    {
        $type = new LogContentType(
            'source-123',
            'Test Source',
            '/var/log/test.log',
            'log content here',
            1024,
            1234567890,
            false
        );

        $this->assertEquals('log content here', $type->getContent());
    }

    public function testGetSizeReturnsCorrectValue(): void
    {
        $type = new LogContentType(
            'source-123',
            'Test Source',
            '/var/log/test.log',
            'log content',
            2048,
            1234567890,
            false
        );

        $this->assertEquals(2048, $type->getSize());
    }

    public function testGetModifiedReturnsCorrectValue(): void
    {
        $type = new LogContentType(
            'source-123',
            'Test Source',
            '/var/log/test.log',
            'log content',
            1024,
            1609459200,
            false
        );

        $this->assertEquals(1609459200, $type->getModified());
    }

    public function testIsTruncatedReturnsFalseWhenNotTruncated(): void
    {
        $type = new LogContentType(
            'source-123',
            'Test Source',
            '/var/log/test.log',
            'log content',
            1024,
            1234567890,
            false
        );

        $this->assertFalse($type->isTruncated());
    }

    public function testIsTruncatedReturnsTrueWhenTruncated(): void
    {
        $type = new LogContentType(
            'source-123',
            'Test Source',
            '/var/log/test.log',
            '[...truncated...]log content',
            1024,
            1234567890,
            true
        );

        $this->assertTrue($type->isTruncated());
    }

    public function testClassIsFinal(): void
    {
        $reflection = new \ReflectionClass(LogContentType::class);

        $this->assertTrue($reflection->isFinal());
    }

    public function testHasTypeAttribute(): void
    {
        $reflection = new \ReflectionClass(LogContentType::class);
        $attributes = $reflection->getAttributes();

        $attributeNames = array_map(fn($a) => $a->getName(), $attributes);
        $this->assertContains('TheCodingMachine\GraphQLite\Annotations\Type', $attributeNames);
    }

    public function testGetSourceIdHasFieldAttribute(): void
    {
        $reflection = new \ReflectionClass(LogContentType::class);
        $method = $reflection->getMethod('getSourceId');
        $attributes = $method->getAttributes();

        $attributeNames = array_map(fn($a) => $a->getName(), $attributes);
        $this->assertContains('TheCodingMachine\GraphQLite\Annotations\Field', $attributeNames);
    }

    public function testAllGettersHaveFieldAttributes(): void
    {
        $reflection = new \ReflectionClass(LogContentType::class);
        $getters = ['getSourceId', 'getSourceName', 'getPath', 'getContent', 'getSize', 'getModified', 'isTruncated'];

        foreach ($getters as $getter) {
            $method = $reflection->getMethod($getter);
            $attributes = $method->getAttributes();
            $attributeNames = array_map(fn($a) => $a->getName(), $attributes);

            $this->assertContains(
                'TheCodingMachine\GraphQLite\Annotations\Field',
                $attributeNames,
                "Method $getter should have Field attribute"
            );
        }
    }
}
