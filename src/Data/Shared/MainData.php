<?php

declare(strict_types=1);

namespace LaravelLang\Config\Data\Shared;

use Illuminate\Support\Collection;
use LaravelLang\Config\Data\Casts\SimpleCollectionCast;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;

class MainData extends Data
{
    public function __construct(
        public bool $inline,
        public bool $align,
        #[WithCast(SimpleCollectionCast::class)]
        public Collection $aliases,
    ) {}
}
