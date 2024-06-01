<?php

declare(strict_types=1);

namespace LaravelLang\Config\Facades;

use Illuminate\Config\Repository;
use LaravelLang\Config\Data\HiddenData;
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
            aliases: static::value(Name::Shared, 'aliases'),
            smartPunctuation: static::smartPunctuation()
        );
    }

    public static function hidden(): HiddenData
    {
        return new HiddenData(
            plugins: static::value(Name::Hidden, 'plugins', PushableData::class),
            packages: static::value(Name::Hidden, 'packages', PushableData::class),
            map: static::value(Name::Hidden, 'map'),
        );
    }

    protected static function smartPunctuation(): SmartPunctuationData
    {
        return new SmartPunctuationData(
            enabled: static::value(Name::Shared, 'enable'),
            common: static::value(Name::Shared, 'common'),
            locales: static::value(Name::Shared, 'locales'),
        );
    }

    protected static function value(Name $name, string $key, ?string $object = null): mixed
    {
        $value = static::repository($name->value . '.' . $key);

        return is_null($object) ? $value : new $object($value);
    }

    protected static function repository(string $key): mixed
    {
        return app(Repository::class)->get($key);
    }
}
