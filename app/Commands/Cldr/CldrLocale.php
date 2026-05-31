<?php

declare(strict_types=1);

namespace LaravelLang\Mona\Commands\Cldr;

class CldrLocale extends CldrCommand
{
    protected string $directory = __DIR__ . '/../../../src/NativeLocaleNames/data';

    protected array $source = [];

    protected function perform(string $forCode, string $locale): string
    {
        $data = $this->loadFile('node_modules/cldr-localenames-full/main/ru/languages.json');

        return $data['main'][$forCode]['localeDisplayNames']['languages'][$locale];
    }
}
