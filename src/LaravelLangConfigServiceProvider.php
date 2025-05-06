<?php

declare(strict_types=1);

namespace LaravelLang\Config;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use LaravelLang\Config\Data\ConfigData;
use LaravelLang\Config\Enums\Name;
use LaravelLang\Config\Helpers\LaravelDataHelper;

use function config;

class LaravelLangConfigServiceProvider extends BaseServiceProvider
{
    public function register(): void
    {
        $this->read();
        $this->init();

        $this->laravelDataOptimizer();
    }

    protected function read(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/main.php', Name::Shared());
        $this->mergeConfigFrom(__DIR__ . '/../config/models.php', Name::Shared());
        $this->mergeConfigFrom(__DIR__ . '/../config/routes.php', Name::Shared());
        $this->mergeConfigFrom(__DIR__ . '/../config/punctuation.php', Name::Shared());
        $this->mergeConfigFrom(__DIR__ . '/../config/translators.php', Name::Shared());
        $this->mergeConfigFrom(__DIR__ . '/../config/private.php', Name::Hidden());
    }

    protected function init(): void
    {
        $this->app->singleton(ConfigData::class, fn () => ConfigData::from([
            'hidden' => config(Name::Hidden()),
            'shared' => config(Name::Shared()),
        ]));
    }

    protected function laravelDataOptimizer(): void
    {
        LaravelDataHelper::initialize();
    }
}
