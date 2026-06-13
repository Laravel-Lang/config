<?php

declare(strict_types=1);

namespace LaravelLang\Config\Data\Shared\Routes;

use Spatie\LaravelData\Data;

class RouteGroupData extends Data
{
    public function __construct(
        public RouteGroupMiddlewareData $middlewares,
    ) {}
}
