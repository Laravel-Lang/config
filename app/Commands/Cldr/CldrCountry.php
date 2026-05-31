<?php

declare(strict_types=1);

namespace LaravelLang\Mona\Commands\Cldr;

final class CldrCountry extends CldrCommand
{
    protected string $directory = __DIR__ . '/../../../src/NativeCountryNames/data';

    protected function perform(string $forCode, string $locale): array
    {
        return [
            'code'      => 'country code by $locale (ZA)',
            'native'    => 'название страны в оригинале by $locale (Suid-Afrika)',
            'localized' => 'country by $forCode (Южно-Африканская Республика)',
        ];
    }
}
