<?php

declare(strict_types=1);

namespace LaravelLang\Config\Data;

use Illuminate\Container\Attributes\Config;

final readonly class RouteData
{
    public function __construct(
        public RouteNameData $name,
        #[Config('localization_routes.name_prefix')]
        public string $namePrefix,
        #[Config('localization_routes.redirect_default')]
        public bool $redirectDefault,
        #[Config('localization_routes.hide_default')]
        public bool $hideDefault,
        #[Config('localization_routes.middlewares')]
        public array $middlewares,
    ) {}
}
