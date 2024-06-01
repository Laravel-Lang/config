<?php

declare(strict_types=1);

use LaravelLang\Config\Facades\Config;
use LaravelLang\LocaleList\Locale;

beforeAll(function () {
    putenv('LOCALIZATION_INLINE=true');
    putenv('LOCALIZATION_ALIGN=false');
    putenv('LOCALIZATION_SMART_ENABLED=true');
});

test('inline', function () {
    expect(Config::shared()->inline)
        ->toBeBool()
        ->toBeTrue()
        ->toBe('localization.inline');
});

test('align', function () {
    expect(Config::shared()->align)
        ->toBeBool()
        ->toBeFalse()
        ->toBe('localization.align');
});

test('aliases', function () {
    expect(Config::shared()->aliases)
        ->toBeArray()
        ->toBe('localization.aliases');
});

test('smart punctuation: enabled', function () {
    expect(Config::shared()->smartPunctuation->enabled)
        ->toBeBool()
        ->toBeTrue()
        ->toBe('localization.smart_punctuation.enabled');
});

test('smart punctuation: common', function () {
    expect(Config::shared()->smartPunctuation->common)
        ->toBeArray()
        ->toBe('localization.smart_punctuation.common');
});

test('smart punctuation: locales', function () {
    expect(Config::shared()->smartPunctuation->locales->all())
        ->toBeArray()
        ->toBe('localization.smart_punctuation.locales');
});

test('smart punctuation: get locale', function () {
    expect(Config::shared()->smartPunctuation->locales->get(Locale::French))
        ->toBeArray()
        ->toBe('localization.smart_punctuation.locales.' . Locale::French->value);
});

test('smart punctuation: get default locale', function () {
    expect(Config::shared()->smartPunctuation->locales->get(Locale::Zulu))
        ->toBeArray()
        ->toBe('localization.smart_punctuation.common');
});
