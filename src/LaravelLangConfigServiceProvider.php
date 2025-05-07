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

    public function boot(): void
    {
        if (! $this->app->runningInConsole()) {
            return;
        }

        $this->publishes([
            __DIR__ . '/../config/main.php' => config_path(Name::Main() . '.php'),
        ], ['config', Name::All(), Name::Main()]);

        $this->publishes([
            __DIR__ . '/../config/models.php' => config_path(Name::Models() . '.php'),
        ], ['config', Name::All(), Name::Models()]);

        $this->publishes([
            __DIR__ . '/../config/routes.php' => config_path(Name::Routes() . '.php'),
        ], ['config', Name::All(), Name::Routes()]);

        $this->publishes([
            __DIR__ . '/../config/punctuation.php' => config_path(Name::Punctuation() . '.php'),
        ], ['config', Name::All(), Name::Punctuation()]);

        $this->publishes([
            __DIR__ . '/../config/translators.php' => config_path(Name::Translators() . '.php'),
        ], ['config', Name::All(), Name::Translators()]);
    }

    protected function read(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/main.php', Name::Main());
        $this->mergeConfigFrom(__DIR__ . '/../config/models.php', Name::Models());
        $this->mergeConfigFrom(__DIR__ . '/../config/routes.php', Name::Routes());
        $this->mergeConfigFrom(__DIR__ . '/../config/punctuation.php', Name::Punctuation());
        $this->mergeConfigFrom(__DIR__ . '/../config/translators.php', Name::Translators());
        $this->mergeConfigFrom(__DIR__ . '/../config/hidden.php', Name::Hidden());
    }

    protected function init(): void
    {
        $this->app->singleton(ConfigData::class, fn () => ConfigData::from([
            'hidden'      => config(Name::Hidden()),
            'main'        => config(Name::Main()),
            'models'      => config(Name::Models()),
            'routes'      => config(Name::Routes()),
            'punctuation' => config(Name::Punctuation()),
            'translators' => config(Name::Translators()),
        ]));
    }

    protected function laravelDataOptimizer(): void
    {
        LaravelDataHelper::initialize();
    }
}
