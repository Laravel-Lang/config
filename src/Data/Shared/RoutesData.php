<?php

declare(strict_types=1);

namespace LaravelLang\Config\Data\Shared;

use Spatie\LaravelData\Data;

class RoutesData extends Data
{
    public RouteNameData $names;

    public string $namePrefix;

    public bool $redirect;

    public RoutesGroup $group;
}
