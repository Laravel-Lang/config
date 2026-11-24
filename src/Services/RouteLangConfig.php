<?php

declare(strict_types=1);

namespace LaravelLang\Config\Services;

use Illuminate\Container\Attributes\Config;

readonly class RouteLangConfig
{
    private const string DefaultPrefix = 'localized.';

    public function __construct(
        public RouteNameLangConfig $name,
        public RouteMiddlewareLangConfig $middlewares,
        #[Config('localization_routes.prefix', self::DefaultPrefix)]
        public string $prefix,
        #[Config('localization_routes.redirect')]
        public bool $redirect,
        #[Config('localization_routes.hide')]
        public bool $hide,
    ) {}

    public function routeNamePrefix(): string
    {
        return $this->prefix === '' ? self::DefaultPrefix : $this->prefix;
    }
}
