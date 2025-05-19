<?php

declare(strict_types=1);

use LaravelLang\Config\Enums\Name;
use LaravelLang\LocaleList\Direction;

test('plugins', function () {
    setConfig(Name::Hidden, 'plugins', ['foo', 'bar']);

    expect(getConfig()->hidden->plugins->all())
        ->toBeArray()
        ->toBe(['foo', 'bar']);

    getConfig()->hidden->plugins->push('baz');

    expect(getConfig()->hidden->plugins->all())
        ->toBeArray()
        ->toBe(['foo', 'bar', 'baz']);
});

test('packages', function () {
    setConfig(Name::Hidden, 'packages', ['foo', 'bar']);

    expect(getConfig()->hidden->packages->all())
        ->toBeArray()
        ->toBe(['foo', 'bar']);

    getConfig()->hidden->packages->push('baz');

    expect(getConfig()->hidden->packages->all())
        ->toBeArray()
        ->toBe(['foo', 'bar', 'baz']);
});

test('models', function () {
    setConfig(Name::Hidden, 'models.directory', __DIR__);

    expect(getConfig()->hidden->models->directory)
        ->toBe(__DIR__);
});

test('map', function () {
    $source = getRawConfig(Name::Hidden, 'meta');

    foreach ($source as &$item) {
        $item['direction'] ??= Direction::LeftToRight;

        $item['direction'] = $item['direction']->value;
    }

    expect(getConfig()->hidden->meta->toArray())
        ->toBeArray()
        ->toBe($source);
});
