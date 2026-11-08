<?php

declare(strict_types=1);

namespace LaravelLang\Config\Data\Shared;

class RoutesGroupMiddleware
{
    public function __construct(
        public ?array $default,
        public ?array $prefix,
    ) {}
}
