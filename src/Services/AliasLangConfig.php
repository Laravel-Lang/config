<?php

declare(strict_types=1);

namespace LaravelLang\Config\Services;

use Illuminate\Support\Collection;
use LaravelLang\LocaleList\Locale;

use function config;

readonly class AliasLangConfig
{
    public function from(Locale|string|null $value): ?string
    {
        if (! $locale = $this->stringify($value)) {
            return null;
        }

        return $this->items()->flip()->get($locale, $locale);
    }

    public function to(Locale|string|null $value): ?string
    {
        if (! $locale = $this->stringify($value)) {
            return null;
        }

        return $this->items()->get($locale, $locale);
    }

    protected function stringify(Locale|string|null $value): ?string
    {
        if ($value instanceof Locale) {
            return $value->value;
        }

        return $value;
    }

    protected function items(): Collection
    {
        return config()->collection('localization_main.aliases');
    }
}
