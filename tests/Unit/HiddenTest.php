<?php

declare(strict_types=1);

use LaravelLang\Config\Enums\Name;
use LaravelLang\LocaleList\Direction;

test('plugins', function () {
    setHiddenConfig('plugins', ['foo', 'bar']);

    expect(getHiddenConfig()->plugins->all())
        ->toBeArray()
        ->toBe(['foo', 'bar']);

    getHiddenConfig()->plugins->push('baz');

    expect(getHiddenConfig()->plugins->all())
        ->toBeArray()
        ->toBe(['foo', 'bar', 'baz']);
});

test('packages', function () {
    setHiddenConfig('packages', ['foo', 'bar']);

    expect(getHiddenConfig()->packages->all())
        ->toBeArray()
        ->toBe(['foo', 'bar']);

    getHiddenConfig()->packages->push('baz');

    expect(getHiddenConfig()->packages->all())
        ->toBeArray()
        ->toBe(['foo', 'bar', 'baz']);
});

test('models', function () {
    setHiddenConfig('models.directory', __DIR__);

    expect(getHiddenConfig()->models->directory)
        ->toBe(__DIR__);
});

test('map', function () {
    $source = getRawConfig('map', Name::Hidden);

    foreach ($source as &$item) {
        $item['direction'] ??= Direction::LeftToRight;

        $item['direction'] = $item['direction']->value;
    }

    expect(getHiddenConfig()->map->toArray())
        ->toBeArray()
        ->toBe($source);
});
