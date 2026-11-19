<?php

declare(strict_types=1);

namespace LaravelLang\Config\Services;

use Illuminate\Container\Attributes\Config;

readonly class RouteLangConfig
{
    public function __construct(
        public RouteNameLangConfig $name,
        public RouteMiddlewareLangConfig $middlewares,
        #[Config('localization_routes.prefix')]
        public ?string $prefix,
        #[Config('localization_routes.redirect')]
        public bool $redirect,
        #[Config('localization_routes.hide')]
        public bool $hide,
    ) {}
}
