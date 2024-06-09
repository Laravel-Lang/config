<?php

declare(strict_types=1);

namespace LaravelLang\Config\Data;

class RoutesData
{
    public function __construct(
        public RouteNameData $names
    ) {}
}
