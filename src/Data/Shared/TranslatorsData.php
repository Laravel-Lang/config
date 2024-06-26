<?php

declare(strict_types=1);

namespace LaravelLang\Config\Data\Shared;

/**
 * @property array<TranslatorData> $all
 * @property array<TranslatorData> $enabled
 */
class TranslatorsData
{
    public function __construct(
        public array $all,
        public array $enabled,
    ) {}
}
