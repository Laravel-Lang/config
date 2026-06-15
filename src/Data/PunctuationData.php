<?php

declare(strict_types=1);

namespace LaravelLang\Config\Data;

use Illuminate\Container\Attributes\Config;

final readonly class PunctuationData
{
    public function __construct(
        #[Config('localization_punctuation.enabled')]
        public bool $enabled,
        #[Config('localization_punctuation.common')]
        public array $common,
        #[Config('localization_punctuation.locales')]
        public array $locales,
    ) {}
}
