<?php

/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

declare(strict_types=1);

namespace OxidSupport\Heartbeat\Tests\Unit\Component\LogSender\Controller\Admin;

use OxidSupport\Heartbeat\Component\LogSender\Controller\Admin\SetupController;
use OxidSupport\Heartbeat\Shared\Controller\Admin\AbstractComponentController;
use OxidSupport\Heartbeat\Shared\Controller\Admin\TogglableComponentInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(SetupController::class)]
final class SetupControllerTest extends TestCase
{
    public function testExtendsAbstractComponentController(): void
    {
        $reflection = new \ReflectionClass(SetupController::class);

        $this->assertTrue($reflection->isSubclassOf(AbstractComponentController::class));
    }

    public function testImplementsTogglableComponentInterface(): void
    {
        $reflection = new \ReflectionClass(SetupController::class);

        $this->assertTrue($reflection->implementsInterface(TogglableComponentInterface::class));
    }

    public function testTemplateIsCorrectlySet(): void
    {
        $reflection = new \ReflectionClass(SetupController::class);
        $property = $reflection->getProperty('_sThisTemplate');

        $this->assertEquals('@oxsheartbeat/admin/heartbeat_logsender_setup', $property->getDefaultValue());
    }

    public function testIsComponentActiveMethodExists(): void
    {
        $reflection = new \ReflectionClass(SetupController::class);

        $this->assertTrue($reflection->hasMethod('isComponentActive'));
    }

    public function testGetStatusClassMethodExists(): void
    {
        $reflection = new \ReflectionClass(SetupController::class);

        $this->assertTrue($reflection->hasMethod('getStatusClass'));
    }

    public function testGetStatusTextKeyMethodExists(): void
    {
        $reflection = new \ReflectionClass(SetupController::class);

        $this->assertTrue($reflection->hasMethod('getStatusTextKey'));
    }

    public function testToggleComponentMethodExists(): void
    {
        $reflection = new \ReflectionClass(SetupController::class);

        $this->assertTrue($reflection->hasMethod('toggleComponent'));
    }

    public function testCanToggleMethodExists(): void
    {
        $reflection = new \ReflectionClass(SetupController::class);

        $this->assertTrue($reflection->hasMethod('canToggle'));
    }

    public function testIsApiUserSetupCompleteMethodExists(): void
    {
        $reflection = new \ReflectionClass(SetupController::class);

        $this->assertTrue($reflection->hasMethod('isApiUserSetupComplete'));
    }

    public function testGetLogSourcesMethodExists(): void
    {
        $reflection = new \ReflectionClass(SetupController::class);

        $this->assertTrue($reflection->hasMethod('getLogSources'));
    }

    public function testToggleSourceMethodExists(): void
    {
        $reflection = new \ReflectionClass(SetupController::class);

        $this->assertTrue($reflection->hasMethod('toggleSource'));
    }

    public function testGetEnabledSourcesMethodExists(): void
    {
        $reflection = new \ReflectionClass(SetupController::class);

        $this->assertTrue($reflection->hasMethod('getEnabledSources'));
    }

    public function testIsSourceEnabledMethodExists(): void
    {
        $reflection = new \ReflectionClass(SetupController::class);

        $this->assertTrue($reflection->hasMethod('isSourceEnabled'));
    }

    public function testGetAvailableSourceCountMethodExists(): void
    {
        $reflection = new \ReflectionClass(SetupController::class);

        $this->assertTrue($reflection->hasMethod('getAvailableSourceCount'));
    }

    public function testGetTotalSourceCountMethodExists(): void
    {
        $reflection = new \ReflectionClass(SetupController::class);

        $this->assertTrue($reflection->hasMethod('getTotalSourceCount'));
    }

    public function testGetStaticPathsTextMethodExists(): void
    {
        $reflection = new \ReflectionClass(SetupController::class);

        $this->assertTrue($reflection->hasMethod('getStaticPathsText'));
    }

    public function testSaveStaticPathsMethodExists(): void
    {
        $reflection = new \ReflectionClass(SetupController::class);

        $this->assertTrue($reflection->hasMethod('saveStaticPaths'));
    }

    public function testClassIsNotFinal(): void
    {
        $reflection = new \ReflectionClass(SetupController::class);

        $this->assertFalse($reflection->isFinal());
    }

    public function testIsComponentActiveReturnsBool(): void
    {
        $reflection = new \ReflectionClass(SetupController::class);
        $method = $reflection->getMethod('isComponentActive');
        $returnType = $method->getReturnType();

        $this->assertNotNull($returnType);
        $this->assertEquals('bool', $returnType->getName());
    }

    public function testCanToggleReturnsBool(): void
    {
        $reflection = new \ReflectionClass(SetupController::class);
        $method = $reflection->getMethod('canToggle');
        $returnType = $method->getReturnType();

        $this->assertNotNull($returnType);
        $this->assertEquals('bool', $returnType->getName());
    }

    public function testGetLogSourcesReturnsArray(): void
    {
        $reflection = new \ReflectionClass(SetupController::class);
        $method = $reflection->getMethod('getLogSources');
        $returnType = $method->getReturnType();

        $this->assertNotNull($returnType);
        $this->assertEquals('array', $returnType->getName());
    }

    public function testGetEnabledSourcesReturnsArray(): void
    {
        $reflection = new \ReflectionClass(SetupController::class);
        $method = $reflection->getMethod('getEnabledSources');
        $returnType = $method->getReturnType();

        $this->assertNotNull($returnType);
        $this->assertEquals('array', $returnType->getName());
    }

    public function testGetStaticPathsTextReturnsString(): void
    {
        $reflection = new \ReflectionClass(SetupController::class);
        $method = $reflection->getMethod('getStaticPathsText');
        $returnType = $method->getReturnType();

        $this->assertNotNull($returnType);
        $this->assertEquals('string', $returnType->getName());
    }

    public function testToggleComponentReturnsVoid(): void
    {
        $reflection = new \ReflectionClass(SetupController::class);
        $method = $reflection->getMethod('toggleComponent');
        $returnType = $method->getReturnType();

        $this->assertNotNull($returnType);
        $this->assertEquals('void', $returnType->getName());
    }

    public function testToggleSourceReturnsVoid(): void
    {
        $reflection = new \ReflectionClass(SetupController::class);
        $method = $reflection->getMethod('toggleSource');
        $returnType = $method->getReturnType();

        $this->assertNotNull($returnType);
        $this->assertEquals('void', $returnType->getName());
    }

    public function testSaveStaticPathsReturnsVoid(): void
    {
        $reflection = new \ReflectionClass(SetupController::class);
        $method = $reflection->getMethod('saveStaticPaths');
        $returnType = $method->getReturnType();

        $this->assertNotNull($returnType);
        $this->assertEquals('void', $returnType->getName());
    }

    public function testHasPrivateApiUserStatusServiceProperty(): void
    {
        $reflection = new \ReflectionClass(SetupController::class);

        $this->assertTrue($reflection->hasProperty('apiUserStatusService'));
        $property = $reflection->getProperty('apiUserStatusService');
        $this->assertTrue($property->isPrivate());
    }

    public function testHasPrivateLogCollectorServiceProperty(): void
    {
        $reflection = new \ReflectionClass(SetupController::class);

        $this->assertTrue($reflection->hasProperty('logCollectorService'));
        $property = $reflection->getProperty('logCollectorService');
        $this->assertTrue($property->isPrivate());
    }
}
