<?php

declare(strict_types=1);

namespace LaravelLang\Config;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use LaravelLang\Config\Enums\Name;

class LaravelLangConfigServiceProvider extends BaseServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/main.php', Name::Shared());
        $this->mergeConfigFrom(__DIR__ . '/../config/models.php', Name::Shared());
        $this->mergeConfigFrom(__DIR__ . '/../config/routes.php', Name::Shared());
        $this->mergeConfigFrom(__DIR__ . '/../config/smart_punctuation.php', Name::Shared());
        $this->mergeConfigFrom(__DIR__ . '/../config/translators.php', Name::Shared());
        $this->mergeConfigFrom(__DIR__ . '/../config/private.php', Name::Hidden());
    }

    public function boot(): void
    {
        if (! $this->app->runningInConsole()) {
            return;
        }

        $this->publishes([
            __DIR__ . '/../config/public.php' => $this->app->configPath(Name::Shared() . '.php'),
        ], ['config', Name::Shared()]);
    }
}
