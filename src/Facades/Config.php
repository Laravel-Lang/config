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
            inline: (bool) static::value(Name::Shared, 'inline'),
            align: (bool) static::value(Name::Shared, 'align'),
            aliases: static::value(Name::Shared, 'aliases', object: NonPushableData::class),
            punctuation: static::smartPunctuation()
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
            enabled: static::value(Name::Shared, 'smart_punctuation.enable'),
            common: static::value(Name::Shared, 'smart_punctuation.common'),

            locales: static::value(
                Name::Shared,
                'smart_punctuation.locales',
                'smart_punctuation.common',
                NonPushableData::class
            ),
        );
    }

    protected static function value(Name $name, string $key, ?string $default = null, ?string $object = null): mixed
    {
        $main    = $name->value . '.' . $key;
        $default = $default ? $name->value . '.' . $default : null;

        if (is_null($object)) {
            return static::repository($main, static::repository($default));
        }

        return new $object($main, $default);
    }

    protected static function repository(?string $key, ?string $default = null): mixed
    {
        if (is_null($key)) {
            return null;
        }

        if (! is_null($default)) {
            $default = static::repository($default);
        }

        return app(Repository::class)->get($key, $default);
    }
}
