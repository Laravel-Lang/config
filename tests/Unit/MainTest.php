<?php

declare(strict_types=1);

use LaravelLang\Config\Enums\Name;
use LaravelLang\LocaleList\Locale;

test('inline', function (bool $is) {
    setConfig(Name::Main, 'inline', $is);

    expect(getConfig()->main->inline)
        ->toBeBool()
        ->toBe($is);
})->with('boolean');

test('align', function (bool $is) {
    setConfig(Name::Main, 'align', $is);

    expect(getConfig()->main->align)
        ->toBeBool()
        ->toBe($is);
})->with('boolean');

test('aliases', function () {
    setConfig(Name::Main, 'aliases', [
        Locale::German->value => 'de_alias',
        Locale::French->value => 'fr_alias',
    ]);

    expect(getConfig()->main->aliases->all())
        ->toBeArray()
        ->toBe(getRawConfig(Name::Main, 'aliases'))
        ->toBe([
            Locale::German->value => 'de_alias',
            Locale::French->value => 'fr_alias',
        ]);
});
