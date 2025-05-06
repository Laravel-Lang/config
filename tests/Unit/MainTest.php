<?php

declare(strict_types=1);

use LaravelLang\LocaleList\Locale;

test('inline', function (bool $is) {
    setSharedConfig('inline', $is);

    expect(getSharedConfig()->inline)
        ->toBeBool()
        ->toBe($is);
})->with('boolean');

test('align', function (bool $is) {
    setSharedConfig('align', $is);

    expect(getSharedConfig()->align)
        ->toBeBool()
        ->toBe($is);
})->with('boolean');

test('aliases', function () {
    setSharedConfig('aliases', [
        Locale::German->value => 'de_alias',
        Locale::French->value => 'fr_alias',
    ]);

    expect(getSharedConfig()->aliases->all())
        ->toBeArray()
        ->toBe(config('localization.aliases'))
        ->toBe([
            Locale::German->value => 'de_alias',
            Locale::French->value => 'fr_alias',
        ]);
});
