<?php

declare(strict_types=1);

namespace LaravelLang\Config;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use LaravelLang\Config\Data\ConfigData;
use LaravelLang\Config\Enums\Name;

use function array_map;
use function config;

class LaravelLangConfigServiceProvider extends BaseServiceProvider
{
    /** @var array<string, Name> */
    protected array $map = [
        'main'        => Name::Main,
        'models'      => Name::Models,
        'routes'      => Name::Routes,
        'punctuation' => Name::Punctuation,
    ];

    public function register(): void
    {
        $this->read();
        $this->init();
    }

    public function boot(): void
    {
        if (! $this->app->runningInConsole()) {
            return;
        }

        foreach ($this->map as $file => $name) {
            $this->publishes([
                __DIR__ . "/../config/$file.php" => $this->app->configPath($file . '.php'),
            ], ['config', $name->value]);
        }
    }

    protected function read(): void
    {
        foreach ($this->map as $file => $name) {
            $this->mergeConfigFrom(__DIR__ . "/../config/$file.php", $name->value);
        }
    }

    protected function init(): void
    {
        $this->app->singleton(ConfigData::class, function (): ConfigData {
            $items = array_map(static fn (Name $name) => config($name->value), $this->map);

            return ConfigData::from($items);
        });
    }
}
