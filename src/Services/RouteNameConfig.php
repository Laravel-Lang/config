<?php

declare(strict_types=1);

namespace LaravelLang\Config\Services;

use Illuminate\Container\Attributes\Config;

readonly class RouteNameConfig
{
    public function __construct(
        #[Config('localization_routes.names.parameter')]
        public string $parameter,
        #[Config('localization_routes.names.header')]
        public string $header,
        #[Config('localization_routes.names.cookie')]
        public string $cookie,
        #[Config('localization_routes.names.session')]
        public string $session,
        #[Config('localization_routes.names.column')]
        public string $column,
    ) {}
}
