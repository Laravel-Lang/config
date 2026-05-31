<?php

declare(strict_types=1);

namespace LaravelLang\Mona\Commands\Cldr;

use Illuminate\Support\Str;

class CldrLocale extends CldrCommand
{
    protected string $directory = __DIR__ . '/../../../src/NativeLocaleNames/data';

    protected array $source = [];

    protected function perform(string $forCode, string $locale): ?string
    {
        $languages = $this->loadFile('node_modules/cldr-localenames-full/main/ru/languages.json');

        $fallbackForCode = Str::before($locale, '-');
        $fallbackLocale  = Str::after($locale, '-');

        $data = $languages['main'][$forCode] ?? $languages['main'][$fallbackForCode] ?? [];

        $values = $data['localeDisplayNames']['languages'];

        return $values[$locale] ?? $values[$fallbackLocale] ?? null;
    }
}
