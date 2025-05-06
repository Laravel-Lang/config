<?php

declare(strict_types=1);

namespace LaravelLang\Config\Data;

use Illuminate\Support\Collection;
use LaravelLang\Config\Data\Casts\SimpleCollectionCast;
use LaravelLang\Config\Data\Shared\ModelData;
use LaravelLang\Config\Data\Shared\PunctuationData;
use LaravelLang\Config\Data\Shared\RoutesData;
use LaravelLang\Config\Data\Shared\TranslatorsData;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class SharedData extends Data
{
    public function __construct(
        public bool $inline,
        public bool $align,
        #[WithCast(SimpleCollectionCast::class)]
        public Collection $aliases,
        public ModelData $models,
        public RoutesData $routes,
        public PunctuationData $punctuation,
        public TranslatorsData $translators,
    ) {}
}
