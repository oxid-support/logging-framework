<?php

/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

declare(strict_types=1);

namespace OxidSupport\LoggingFramework\Component\RequestLoggerRemote\Service;

use OxidEsales\GraphQL\ConfigurationAccess\Module\Service\ModuleSettingServiceInterface as ConfigAccessSettingService;
use OxidSupport\LoggingFramework\Module\Module as RequestLoggerModule;

/**
 * Service for managing Request Logger component activation state.
 *
 * This service controls the requestlogger_active setting which determines
 * whether the Request Logger component is actively logging requests.
 */
final readonly class ActivationService implements ActivationServiceInterface
{
    private const SETTING_ACTIVE = RequestLoggerModule::SETTING_REQUESTLOGGER_ACTIVE;

    public function __construct(
        private ConfigAccessSettingService $moduleSettingService
    ) {
    }

    public function activate(): bool
    {
        return $this->moduleSettingService
            ->changeBooleanSetting(self::SETTING_ACTIVE, true, RequestLoggerModule::ID)
            ->getValue();
    }

    public function deactivate(): bool
    {
        $this->moduleSettingService
            ->changeBooleanSetting(self::SETTING_ACTIVE, false, RequestLoggerModule::ID);

        return true;
    }

    public function isActive(): bool
    {
        return $this->moduleSettingService
            ->getBooleanSetting(self::SETTING_ACTIVE, RequestLoggerModule::ID)
            ->getValue();
    }
}
