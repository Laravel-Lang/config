<?php

declare(strict_types=1);

namespace LaravelLang\Config\Services;

use Illuminate\Config\Repository;
use LaravelLang\Config\Data\HiddenData;
use LaravelLang\Config\Data\NonPushableData;
use LaravelLang\Config\Data\PushableData;
use LaravelLang\Config\Data\RouteNameData;
use LaravelLang\Config\Data\RoutesData;
use LaravelLang\Config\Data\SharedData;
use LaravelLang\Config\Data\SmartPunctuationData;
use LaravelLang\Config\Enums\Name;

use function is_null;

class Config
{
    public function __construct(
        protected Repository $config
    ) {}

    public function shared(): SharedData
    {
        return new SharedData(
            inline     : (bool) $this->value(Name::Shared, 'inline'),
            align      : (bool) $this->value(Name::Shared, 'align'),
            aliases    : $this->value(Name::Shared, 'aliases', object: NonPushableData::class),
            punctuation: $this->smartPunctuation(),
            routes     : $this->routes(),
        );
    }

    public function hidden(): HiddenData
    {
        return new HiddenData(
            plugins : $this->value(Name::Hidden, 'plugins', object: PushableData::class),
            packages: $this->value(Name::Hidden, 'packages', object: PushableData::class),
            map     : $this->value(Name::Hidden, 'map', object: NonPushableData::class),
        );
    }

    protected function smartPunctuation(): SmartPunctuationData
    {
        return new SmartPunctuationData(
            enabled: $this->value(Name::Shared, 'smart_punctuation.enable'),
            common : $this->value(Name::Shared, 'smart_punctuation.common'),

            locales: $this->value(
                Name::Shared,
                'smart_punctuation.locales',
                'smart_punctuation.common',
                NonPushableData::class
            ),
        );
    }

    protected function routes(): RoutesData
    {
        return new RoutesData(
            names: new RouteNameData(
                parameter: $this->value(Name::Shared, 'routes.names.parameter'),
                header   : $this->value(Name::Shared, 'routes.names.header'),
                cookie   : $this->value(Name::Shared, 'routes.names.cookie'),
                session  : $this->value(Name::Shared, 'routes.names.session'),
            )
        );
    }

    protected function value(Name $name, string $key, ?string $default = null, ?string $object = null): mixed
    {
        $main    = $name->value . '.' . $key;
        $default = $default ? $name->value . '.' . $default : null;

        if (is_null($object)) {
            return $this->repository($main, $this->repository($default));
        }

        return new $object($main, $default);
    }

    protected function repository(?string $key, ?string $default = null): mixed
    {
        if (is_null($key)) {
            return null;
        }

        if (! is_null($default)) {
            $default = $this->repository($default);
        }

        return $this->config->get($key, $default);
    }
}
