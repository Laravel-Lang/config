<?php

declare(strict_types=1);

use LaravelLang\Config\Data\SmartPunctuation\PunctuationItemData;
use LaravelLang\Config\Enums\Name;
use LaravelLang\LocaleList\Locale;

test('enabled', function (bool $is) {
    setConfig(Name::Punctuation, 'enabled', $is);

    expect(getConfig()->punctuation->enabled)
        ->toBeBool()
        ->toBe($is);
})->with('boolean');

test('common', function () {
    expect(getConfig()->punctuation->common)
        ->toBeInstanceOf(PunctuationItemData::class)
        ->toArray()
        ->toBe(getRawConfig(Name::Punctuation, 'common'));
});

test('locales', function (string $locale) {
    $content = getRawConfig(Name::Punctuation, 'locales.' . $locale);

    expect($content)->not->toBeEmpty();

    expect(getConfig()->punctuation->locales)
        ->toHaveKey($locale)
        ->get($locale)
        ->toArray()
        ->toBe($content);
})->with('punctuation locales');

test('unspecified locale', function () {
    expect(getConfig()->punctuation->locales)
        ->not->toHaveKey(Locale::Zulu->value)
        ->get(Locale::Zulu->value)
        ->toBeNull();
});
