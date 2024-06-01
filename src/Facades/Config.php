<?php

declare(strict_types=1);

namespace LaravelLang\Config\Facades;

use Illuminate\Config\Repository;
use LaravelLang\Config\Data\HiddenData;
use LaravelLang\Config\Data\NonPushableData;
use LaravelLang\Config\Data\PushableData;
use LaravelLang\Config\Data\SharedData;
use LaravelLang\Config\Data\SmartPunctuationData;
use LaravelLang\Config\Enums\Name;

class Config
{
    public static function shared(): SharedData
    {
        return new SharedData(
            inline: static::value(Name::Shared, 'inline'),
            align: static::value(Name::Shared, 'align'),
            aliases: static::value(Name::Shared, 'aliases', object: PushableData::class),
            smartPunctuation: static::smartPunctuation()
        );
    }

    public static function hidden(): HiddenData
    {
        return new HiddenData(
            plugins: static::value(Name::Hidden, 'plugins', object: PushableData::class),
            packages: static::value(Name::Hidden, 'packages', object: PushableData::class),
            map: static::value(Name::Hidden, 'map', object: NonPushableData::class),
        );
    }

    protected static function smartPunctuation(): SmartPunctuationData
    {
        return new SmartPunctuationData(
            enabled: static::value(Name::Shared, 'smart_punctuation.enabled'),
            common: static::value(Name::Shared, 'smart_punctuation.common'),

            locales: static::value(
                Name::Shared,
                'smart_punctuation.locales',
                'smart_punctuation.common',
                PushableData::class
            ),
        );
    }

    protected static function value(Name $name, string $key, ?string $default = null, ?string $object = null): mixed
    {
        if (is_null($object)) {
            return static::repository($name->value . '.' . $key, $default);
        }

        return new $object($name->value . '.' . $key, $name->value, '.' . $default);
    }

    protected static function repository(string $key, ?string $default = null): mixed
    {
        if (! is_null($default)) {
            $default = static::repository($default);
        }

        return app(Repository::class)->get($key, $default);
    }
}
