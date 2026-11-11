<?php

declare(strict_types=1);

namespace LaravelLang\Config\Services;

use Illuminate\Container\Attributes\Config;

readonly class RouteGroupMiddlewareConfig
{
    public function __construct(
        #[Config('localization_routes.group.middlewares.default')]
        public array $default,
        #[Config('localization_routes.group.middlewares.prefix')]
        public array $prefix,
    ) {}
}
