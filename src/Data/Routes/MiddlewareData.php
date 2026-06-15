<?php

declare(strict_types=1);

namespace LaravelLang\Config\Data\Routes;

use Illuminate\Container\Attributes\Config;

final readonly class MiddlewareData
{
    public function __construct(
        #[Config('localization_routes.middlewares.default')]
        public array $default,
        #[Config('localization_routes.middlewares.prefix')]
        public array $prefix,
    ) {}
}
