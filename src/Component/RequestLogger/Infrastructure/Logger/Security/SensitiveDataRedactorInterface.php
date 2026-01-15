<?php

declare(strict_types=1);

namespace OxidSupport\Heartbeat\Component\RequestLogger\Infrastructure\Logger\Security;

interface SensitiveDataRedactorInterface
{
    public function redact(array $values): array;
}
