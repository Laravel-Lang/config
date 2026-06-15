<?php

declare(strict_types=1);

namespace LaravelLang\Config;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use LaravelLang\Config\Enums\Name;

use function strtolower;

class LaravelLangConfigServiceProvider extends BaseServiceProvider
{
    public function register(): void
    {
        foreach (Name::cases() as $case) {
            $this->mergeConfigFrom(
                path: __DIR__ . '/../config/' . $this->filename($case) . '.php',
                key : $case->value
            );
        }
    }

    public function boot(): void
    {
        if (! $this->app->runningInConsole()) {
            return;
        }

        foreach (Name::cases() as $case) {
            $filename = $this->filename($case);

            $this->publishes([
                __DIR__ . '/../config/' . $filename . '.php' => $this->app->configPath($case->value . '.php'),
            ], ['config', $case->name]);
        }
    }

    protected function filename(Name $name): string
    {
        return strtolower($name->value);
    }
}
