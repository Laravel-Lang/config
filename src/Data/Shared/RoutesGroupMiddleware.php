<?php

declare(strict_types=1);

namespace LaravelLang\Config\Data\Shared;

use Spatie\LaravelData\Data;

class RoutesGroupMiddleware extends Data
{
    public ?array $default;

    public ?array $prefix;
}
