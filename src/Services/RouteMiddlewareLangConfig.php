<?php

declare(strict_types=1);

namespace LaravelLang\Config\Services;

use Illuminate\Container\Attributes\Config;

readonly class RouteMiddlewareLangConfig
{
    /**
     * @param  array<array-key, string>  $default
     * @param  array<array-key, string>  $prefix
     */
    public function __construct(
        #[Config('localization_routes.middlewares.default')]
        public array $default,
        #[Config('localization_routes.middlewares.prefix')]
        public array $prefix,
    ) {}
}
