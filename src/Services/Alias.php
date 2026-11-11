<?php

declare(strict_types=1);

namespace LaravelLang\Config\Services;

use Illuminate\Support\Collection;
use LaravelLang\LocaleList\Locale;
use LaravelLang\Locales\Data\LocaleData;

use function config;

class Alias
{
    public function from(Locale|LocaleData|string|null $value): ?string
    {
        if (! $locale = $this->stringify($value)) {
            return null;
        }

        return $this->items()->flip()->get($locale, $locale);
    }

    public function to(Locale|LocaleData|string|null $value): ?string
    {
        if (! $locale = $this->stringify($value)) {
            return null;
        }

        return $this->items()->get($locale, $locale);
    }

    protected function stringify(Locale|LocaleData|string|null $value): ?string
    {
        return match (true) {
            $value instanceof LocaleData => $value->code,
            $value instanceof Locale     => $value->value,
            default                      => $value,
        };
    }

    protected function items(): Collection
    {
        return config()->collection('localization_main.aliases');
    }
}
