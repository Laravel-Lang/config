<?php

declare(strict_types=1);

test('suffix', function (string $value) {
    setSharedConfig('models.suffix', $value);

    expect(getSharedConfig()->models->suffix)
        ->toBeString()
        ->toBe($value);
})->with('foo bar');

test('directory', function (string $value) {
    setSharedConfig('models.directory', $value);

    expect(getSharedConfig()->models->directory)
        ->toBeString()
        ->toBe($value);
})->with('foo bar');

test('helpers', function () {
    setSharedConfig('models.helpers', __DIR__);

    expect(getSharedConfig()->models->helpers)
        ->toBeString()
        ->toBe(__DIR__);
});

test('filter', function (bool $is) {
    setSharedConfig('models.filter.enabled', $is);

    expect(getSharedConfig()->models->filter->enabled)
        ->toBeBool()
        ->toBe($is);
})->with('boolean');
