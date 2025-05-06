<?php

declare(strict_types=1);

test('names', function () {
    expect(getSharedConfig()->routes->names)
        ->toArray()
        ->toBe(config('localization.routes.names'));
});

test('name prefix', function () {
    expect(getSharedConfig()->routes->namePrefix)
        ->toBeString()
        ->toBe(config('localization.routes.name_prefix'));
});

test('redirect default', function () {
    expect(getSharedConfig()->routes->redirectDefault)
        ->toBeBool()
        ->toBe(config('localization.routes.redirect_default'));
});

test('hide default', function () {
    expect(getSharedConfig()->routes->hideDefault)
        ->toBeBool()
        ->toBe(config('localization.routes.hide_default'));
});
