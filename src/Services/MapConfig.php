<?php

declare(strict_types=1);

namespace LaravelLang\Config\Services;

use Illuminate\Container\Attributes\Config;
use LaravelLang\LocaleList\Locale;

use function Illuminate\Support\enum_value;

readonly class MapConfig
{
    public function __construct(
        #[Config('localization_map.locales')]
        public array $map,
    ) {}

    public function get(Locale|string $locale): array
    {
        $value = enum_value($locale);

        return $this->map[$value] ?? [];
    }
}
