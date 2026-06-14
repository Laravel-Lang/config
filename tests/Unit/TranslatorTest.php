<?php

declare(strict_types=1);

use LaravelLang\Config\Enums\Name;

test('channels', function (string $channel) {
    expect(getConfig()->translators->channels)
        ->toHaveKey($channel)
        ->toHaveCount(count(getRawConfig(Name::Translators, 'channels')));
})->with('translator channels');

test('channel', function () {
    setConfig(Name::Translators, 'channels.foo', [
        'enabled'    => true,
        'translator' => 'Foo\\Bar',
        'priority'   => 123,

        'meta' => $meta = [
            'foo' => 'Foo',
            'bar' => 'Bar',
        ],
    ]);

    expect(getConfig()->translators->channels->get('foo'))
        ->enabled->toBeTrue()
        ->translator->toBe('Foo\\Bar')
        ->priority->toBe(123)
        ->meta->toArray()->toBe($meta);
});

test('enabled', function (string $channel, bool $is) {
    setConfig(Name::Translators, "channels.$channel.enabled", $is);

    expect(getConfig()->translators->channels)
        ->get($channel)
        ->enabled
        ->toBeBool()
        ->toBe($is);
})->with('translator channels', 'boolean');

test('options', function (bool $is) {
    setConfig(Name::Translators, 'options.preserve_parameters', $is);

    expect(getConfig()->translators->options->preserveParameters)
        ->toBeBool()
        ->toBe($is);
})->with('boolean');
