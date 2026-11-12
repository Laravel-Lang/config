<?php

declare(strict_types=1);

namespace LaravelLang\Config;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class LaravelLangConfigServiceProvider extends BaseServiceProvider
{
    protected array $files = [
        'localization_main',
        'localization_models',
        'localization_punctuation',
        'localization_routes',
    ];

    public function register(): void
    {
        foreach ($this->files as $filename) {
            $this->mergeConfigFrom(
                path: __DIR__ . "/../config/$filename.php",
                key : $filename
            );
        }

        $this->mergeConfigFrom(
            path: __DIR__ . "/../config/localization_private.php",
            key : 'localization_private'
        );
    }

    public function boot(): void
    {
        if (! $this->app->runningInConsole()) {
            return;
        }

        foreach ($this->files as $filename) {
            $this->publishes([
                __DIR__ . "/../config/$filename.php",
            ], ['config', 'localization', $filename]);
        }
    }
}
