<?php

declare(strict_types=1);

namespace LaravelLang\Config\Data\Casts;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\Creation\CreationContext;
use Spatie\LaravelData\Support\DataProperty;

class SimpleCollectionCast implements Cast
{
    public function cast(DataProperty $property, mixed $value, array $properties, CreationContext $context): Collection
    {
        return new Collection($value);
    }
}
