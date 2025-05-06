<?php

declare(strict_types=1);

use Tests\TestCase;

pest()
    ->printer()
    ->compact();

pest()
    ->uses(TestCase::class)
    ->in('Unit')
    ->beforeAll(function () {
        setSharedConfig('translators.channels.google.enabled', false);
        setSharedConfig('translators.channels.google.priority', 5);

        setSharedConfig('translators.channels.deepl.enabled', true);
        setSharedConfig('translators.channels.deepl.priority', 6);
        setSharedConfig('translators.channels.deepl.credentials.key', 'qwerty123');

        setSharedConfig('translators.channels.yandex.enabled', true);
        setSharedConfig('translators.channels.yandex.priority', 7);
        setSharedConfig('translators.channels.yandex.credentials.key', 'qwerty456');
        setSharedConfig('translators.channels.yandex.credentials.folder', '123');
    });
