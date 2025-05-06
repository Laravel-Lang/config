<?php

declare(strict_types=1);

test('channels', function (string $channel) {
    expect(getSharedConfig()->translators->channels)
        ->toHaveKey($channel)
        ->toHaveCount(count(getRawConfig('translators.channels')));
})->with('translator channels');

test('channel', function () {
    setSharedConfig('translators.channels.foo', [
        'enabled'    => true,
        'translator' => 'Foo\\Bar',
        'priority'   => 123,

        'meta' => $meta = [
            'foo' => 'Foo',
            'bar' => 'Bar',
        ],
    ]);

    expect(getSharedConfig()->translators->channels->get('foo'))
        ->enabled->toBeTrue()
        ->translator->toBe('Foo\\Bar')
        ->priority->toBe(123)
        ->meta->toArray()->toBe($meta);
});

test('enabled', function (string $channel, bool $is) {
    setSharedConfig("translators.channels.$channel.enabled", $is);

    expect(getSharedConfig()->translators->channels)
        ->get($channel)
        ->enabled
        ->toBeBool()
        ->toBe($is);
})->with('translator channels', 'boolean');

test('options', function (bool $is) {
    setSharedConfig('translators.options.preserve_parameters', $is);

    expect(getSharedConfig()->translators->options->preserveParameters)
        ->toBeBool()
        ->toBe($is);
})->with('boolean');
