<?php

declare(strict_types=1);

namespace LaravelLang\Config;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use LaravelLang\Config\Enums\Name;

class ServiceProvider extends BaseServiceProvider
{
    protected array $files = [
        'localization_main',
    ];

    public function register(): void
    {
        $this->registerConfig();

        $this->mergeConfigFrom(__DIR__ . '/../config/localization_main.php', 'localization_main');
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->bootPublishes();
        }

        if (! $this->app->runningInConsole()) {
            return;
        }

        foreach ($this->files as $filename) {
            $this->publishes([
                __DIR__ . "/../config/$filename.php",
            ], ['config', 'localization', $filename]);
        }
    }

    /** @deprecated */
    protected function bootPublishes(): void
    {
        $this->publishes([
            __DIR__ . '/../config/public.php' => $this->app->configPath(Name::Shared() . '.php'),
        ], ['config', Name::Shared()]);
    }

    /** @deprecated */
    protected function registerConfig(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/public.php', Name::Shared());
        $this->mergeConfigFrom(__DIR__ . '/../config/private.php', Name::Hidden());
    }
}
