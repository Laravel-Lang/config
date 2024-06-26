<?php

declare(strict_types=1);

namespace LaravelLang\Config\Data\Shared;

class TranslatorData
{
    public function __construct(
        public bool $enabled,
        public string $translator,
        public array $credentials = [],
    ) {}
}
