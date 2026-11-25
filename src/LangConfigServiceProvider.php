<?php

declare(strict_types=1);

namespace LaravelLang\Config;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

final class LangConfigServiceProvider extends BaseServiceProvider
{
    /** @var list<string> */
    protected array $publishable = [
        'localization_main',
        'localization_map',
        'localization_models',
        'localization_punctuation',
        'localization_routes',
    ];

    /** @var list<string> */
    protected array $hidden = [
        'localization_map',
    ];

    public function register(): void
    {
        $this->registerConfig($this->publishable);
        $this->registerConfig($this->hidden);
    }

    public function boot(): void
    {
        if (! $this->app->runningInConsole()) {
            return;
        }

        foreach ($this->publishable as $filename) {
            $this->publishes([
                __DIR__ . "/../config/$filename.php" => $this->app->configPath("$filename.php"),
            ], ['config', 'localization', $filename]);
        }
    }

    /** @param list<string> $files */
    protected function registerConfig(array $files): void
    {
        foreach ($files as $filename) {
            $this->mergeConfigFrom(
                path: __DIR__ . "/../config/$filename.php",
                key : $filename
            );
        }
    }
}
