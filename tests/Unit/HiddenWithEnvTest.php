<?php

declare(strict_types=1);

use LaravelLang\Config\Facades\Config;

beforeAll(function () {
    putenv('LOCALIZATION_INLINE=true');
    putenv('LOCALIZATION_ALIGN=true');
    putenv('LOCALIZATION_SMART_ENABLED=true');
});

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

test('models', function () {
    config(['localization-private.models.directory' => __DIR__]);

    expect(Config::hidden()->models->directory)
        ->toBe(__DIR__)
        ->toBe(config('localization-private.models.directory'));
});

test('map', function () {
    expect(Config::hidden()->map->all())
        ->toBeArray()
        ->toBe(config('localization-private.map'));
});
