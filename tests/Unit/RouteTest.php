<?php

declare(strict_types=1);

use Illuminate\Support\Str;
use LaravelLang\Config\Constants\RouteName;
use LaravelLang\Config\Enums\Name;

test('names', function () {
    expect(getConfig()->routes->names)
        ->toArray()
        ->toBe(getRawConfig(Name::Routes, 'names'));

    $class = new ReflectionClass(RouteName::class);

    foreach ($class->getConstants() as $name => $value) {
        $key = Str::lower($name);

        expect(getConfig()->routes->names->{$key})
            ->toBeString()
            ->toBe($value);
    }
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
