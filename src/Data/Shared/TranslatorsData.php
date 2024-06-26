<?php

declare(strict_types=1);

namespace LaravelLang\Config\Data\Shared;

class TranslatorsData
{
    public function __construct(
        /**
         * @var array<TranslatorData> $all
         */
        public array $all,
    ) {}
}
