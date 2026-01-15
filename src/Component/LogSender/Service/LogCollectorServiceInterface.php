<?php

/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

declare(strict_types=1);

namespace OxidSupport\Heartbeat\Component\LogSender\Service;

use OxidSupport\Heartbeat\Component\LogSender\DataType\LogPath;
use OxidSupport\Heartbeat\Component\LogSender\DataType\LogSource;
use OxidSupport\Heartbeat\Component\LogSender\Exception\LogSourceNotFoundException;

/**
 * Service for collecting log sources from static paths and DI-tagged providers.
 */
interface LogCollectorServiceInterface
{
    /**
     * Collects all log sources (static + provider).
     *
     * @return LogSource[]
     */
    public function getSources(): array;

    /**
     * Returns a specific log source by its ID.
     *
     * @throws LogSourceNotFoundException
     */
    public function getSourceById(string $sourceId): LogSource;

    /**
     * Returns the static paths configured in module settings.
     *
     * @return LogPath[]
     */
    public function getStaticPaths(): array;
}
