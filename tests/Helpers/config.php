<?php

declare(strict_types=1);

use LaravelLang\Config\Data\ConfigData;
use LaravelLang\Config\Data\HiddenData;
use LaravelLang\Config\Data\SharedData;
use LaravelLang\Config\Enums\Name;

function setConfig(Name $name, string $key, mixed $value): void
{
    config()->set($name->value . '.' . $key, $value);
}

function setHiddenConfig(string $key, mixed $value): void
{
    setConfig(Name::Hidden, $key, $value);
}

function setSharedConfig(string $key, mixed $value): void
{
    setConfig(Name::Shared, $key, $value);
}

function getConfig(): ConfigData
{
    return app()->make(ConfigData::class);
}

function getHiddenConfig(): HiddenData
{
    return getConfig()->hidden;
}

function getSharedConfig(): SharedData
{
    return getConfig()->shared;
}

function getRawConfig(string $key, Name $name = Name::Shared): mixed
{
    return config($name->value . '.' . $key);
}
