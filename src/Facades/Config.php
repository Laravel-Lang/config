<?php

declare(strict_types=1);

namespace LaravelLang\Config\Facades;

use Illuminate\Support\Facades\Facade;
use LaravelLang\Config\Data\ConfigData;
use LaravelLang\Config\Enums\Name;

use function config;

class Config extends Facade
{
    protected static function getFacadeAccessor(): ConfigData
    {
        return ConfigData::from([
            'shared' => config(Name::Shared()),
            'hidden' => config(Name::Hidden()),
        ]);
    }
}
