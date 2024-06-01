<?php

declare(strict_types=1);

namespace LaravelLang\Config\Data;

class SharedData
{
    public function __construct(
        public bool $inline,
        public bool $align,
        public array $aliases,
        public SmartPunctuationData $smartPunctuation,
    ) {
    }
}
