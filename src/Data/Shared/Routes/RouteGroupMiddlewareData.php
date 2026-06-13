<?php

declare(strict_types=1);

namespace LaravelLang\Config\Data\Shared\Routes;

use Illuminate\Support\Collection;
use LaravelLang\Config\Data\Casts\SimpleCollectionCast;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;

class RouteGroupMiddlewareData extends Data
{
    public function __construct(
        #[WithCast(SimpleCollectionCast::class)]
        public Collection $default,
        #[WithCast(SimpleCollectionCast::class)]
        public Collection $prefix,
    ) {}
}
