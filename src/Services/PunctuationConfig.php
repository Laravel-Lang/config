<?php

declare(strict_types=1);

namespace LaravelLang\Config\Services;

use Illuminate\Container\Attributes\Config;

use function array_merge;

class PunctuationConfig
{
    public function __construct(
        #[Config('localization_punctuation.enabled')]
        public readonly bool $enabled,
        #[Config('localization_punctuation.common')]
        protected array $common,
        #[Config('localization_punctuation.locales')]
        protected array $locales,
    ) {}

    public function get(string $locale): array
    {
        if (! $this->enabled) {
            return [];
        }

        return $this->prepare($locale);
    }

    protected function prepare(string $locale): array
    {
        return array_merge($this->common, $this->locales[$locale] ?? []);
    }
}
