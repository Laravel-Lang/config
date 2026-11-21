<?php

declare(strict_types=1);

namespace LaravelLang\Config\Services;

use Illuminate\Support\Collection;
use LaravelLang\LocaleList\Locale;
use LaravelLang\NativeLocaleNames\LocaleData;

use function config;

readonly class AliasLangConfig
{
    public function from(Locale|LocaleData|string|null $value): ?string
    {
        if ($value instanceof LocaleData) {
            return $value->code;
        }

        if (! $locale = $this->stringify($value)) {
            return null;
        }

        return $this->items()->flip()->get($locale, $locale);
    }

    public function to(Locale|LocaleData|string|null $value): ?string
    {
        if ($value instanceof LocaleData) {
            return $value->alias;
        }

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

    /** @return Collection<string, string> */
    protected function items(): Collection
    {
        return config()->collection('localization_main.aliases');
    }
}
