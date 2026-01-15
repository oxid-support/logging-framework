<?php

declare(strict_types=1);

namespace OxidSupport\Heartbeat\Component\RequestLogger\Infrastructure\Logger\Processor;

interface CorrelationIdProcessorInterface
{
    public function __invoke(array $record): array;
}
