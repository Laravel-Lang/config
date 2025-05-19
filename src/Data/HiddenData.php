<?php

declare(strict_types=1);

namespace LaravelLang\Config\Data;

use Illuminate\Support\Collection;
use LaravelLang\Config\Data\Casts\SimpleCollectionCast;
use LaravelLang\Config\Data\Hidden\MetaData;
use LaravelLang\Config\Data\Hidden\ModelsData;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;

class HiddenData extends Data
{
    public function __construct(
        #[WithCast(SimpleCollectionCast::class)]
        public Collection $plugins,
        #[WithCast(SimpleCollectionCast::class)]
        public Collection $packages,
        #[DataCollectionOf(MetaData::class)]
        public Collection $meta,
        public ModelsData $models,
    ) {}
}
