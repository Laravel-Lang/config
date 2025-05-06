<?php

declare(strict_types=1);

use LaravelLang\Config\Data\SmartPunctuation\PunctuationItemData;
use LaravelLang\LocaleList\Locale;

test('enabled', function (bool $is) {
    setSharedConfig('punctuation.enabled', $is);

    expect(getSharedConfig()->punctuation->enabled)
        ->toBeBool()
        ->toBe($is);
})->with('boolean');

test('common', function () {
    expect(getSharedConfig()->punctuation->common)
        ->toBeInstanceOf(PunctuationItemData::class)
        ->toArray()
        ->toBe(config('localization.punctuation.common'));
});

test('locales', function (string $locale) {
    $content = getRawConfig('punctuation.locales.' . $locale);

    expect($content)->not->toBeEmpty();

    expect(getSharedConfig()->punctuation->locales)
        ->toHaveKey($locale)
        ->get($locale)
        ->toArray()
        ->toBe($content);
})->with('punctuation locales');

test('unspecified locale', function () {
    expect(getSharedConfig()->punctuation->locales)
        ->not->toHaveKey(Locale::Zulu->value)
        ->get(Locale::Zulu->value)
        ->toBeNull();
});
