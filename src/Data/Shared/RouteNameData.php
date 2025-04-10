<?php

declare(strict_types=1);

namespace LaravelLang\Config\Data\Shared;

use Spatie\LaravelData\Data;

class RouteNameData extends Data
{
    public string $parameter;

    public string $header;

    public string $cookie;

    public string $session;

    public string $column;
}
