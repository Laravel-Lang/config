<?php

declare(strict_types=1);

namespace LaravelLang\Config\Data\Shared;

class RoutesGroup
{
    public function __construct(
        public RoutesGroupMiddleware $middleware,
    ) {}
}
