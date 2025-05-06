<?php

declare(strict_types=1);

use LaravelLang\Config\Data\ConfigData;
use LaravelLang\Config\Enums\Name;

function setConfig(Name $name, string $key, mixed $value): void
{
    config()?->set($name->value . '.' . $key, $value);
}

function getConfig(): ConfigData
{
    return app()->make(ConfigData::class);
}

function getRawConfig(Name $name, string $key): mixed
{
    return config($name->value . '.' . $key);
}
