<?php

declare(strict_types=1);

namespace LaravelLang\Config\Data;

class SmartPunctuationData
{
    public function __construct(
        public bool $enabled,
        public array $common,
        public NonPushableData $locales,
    ) {}
}
