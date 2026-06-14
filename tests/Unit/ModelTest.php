<?php

declare(strict_types=1);

use LaravelLang\Config\Enums\Name;

test('suffix', function (string $value) {
    setConfig(Name::Models, 'suffix', $value);

    expect(getConfig()->models->suffix)
        ->toBeString()
        ->toBe($value);
})->with('foo bar');

test('directory', function (string $value) {
    setConfig(Name::Models, 'directory', $value);

    expect(getConfig()->models->directory)
        ->toBeString()
        ->toBe($value);
})->with('foo bar');

test('helpers', function () {
    setConfig(Name::Models, 'helpers', __DIR__);

    expect(getConfig()->models->helpers)
        ->toBeString()
        ->toBe(__DIR__);
});

test('filter', function (bool $is) {
    setConfig(Name::Models, 'filter.enabled', $is);

    expect(getConfig()->models->filter->enabled)
        ->toBeBool()
        ->toBe($is);
})->with('boolean');
