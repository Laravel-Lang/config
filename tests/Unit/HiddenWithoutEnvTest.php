<?php

declare(strict_types=1);

use LaravelLang\Config\Facades\Config;

test('plugins', function () {
    config(['localization-private.plugins' => ['foo', 'bar']]);

    expect(Config::hidden()->plugins->all())
        ->toBeArray()
        ->toBe(['foo', 'bar'])
        ->toBe(config('localization-private.plugins'));

    Config::hidden()->plugins->push('baz');

    expect(Config::hidden()->plugins->all())
        ->toBeArray()
        ->toBe(['foo', 'bar', 'baz'])
        ->toBe(config('localization-private.plugins'));
});

test('packages', function () {
    config(['localization-private.packages' => ['foo', 'bar']]);

    expect(Config::hidden()->packages->all())
        ->toBeArray()
        ->toBe(['foo', 'bar'])
        ->toBe(config('localization-private.packages'));

    Config::hidden()->packages->push('baz');

    expect(Config::hidden()->packages->all())
        ->toBeArray()
        ->toBe(['foo', 'bar', 'baz'])
        ->toBe(config('localization-private.packages'));
});

test('map', function () {
    expect(Config::hidden()->map->all())
        ->toBeArray()
        ->toBe(config('localization-private.map'));
});
