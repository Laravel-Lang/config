<?php

declare(strict_types=1);

use LaravelLang\Config\Enums\Name;

test('names', function () {
    expect(getConfig()->routes->names)
        ->toArray()
        ->toBe(getRawConfig(Name::Routes, 'names'));
});

test('name prefix', function () {
    expect(getConfig()->routes->namePrefix)
        ->toBeString()
        ->toBe(getRawConfig(Name::Routes, 'name_prefix'));
});

test('redirect default', function () {
    expect(getConfig()->routes->redirectDefault)
        ->toBeBool()
        ->toBe(getRawConfig(Name::Routes, 'redirect_default'));
});

test('hide default', function () {
    expect(getConfig()->routes->hideDefault)
        ->toBeBool()
        ->toBe(getRawConfig(Name::Routes, 'hide_default'));
});
