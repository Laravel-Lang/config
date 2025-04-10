<?php

declare(strict_types=1);

namespace LaravelLang\Config\Data\Shared;

use Spatie\LaravelData\Data;

class RoutesGroup extends Data
{
    public RoutesGroupMiddleware $middleware;
}
