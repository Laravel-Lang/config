<?php

declare(strict_types=1);

namespace LaravelLang\Config\Data\Translators;

use Illuminate\Support\Collection;
use LaravelLang\Config\Data\Casts\SimpleCollectionCast;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;

class TranslatorChannelData extends Data
{
    public function __construct(
        public bool $enabled,
        public string $translator,
        public int $priority,
        #[WithCast(SimpleCollectionCast::class)]
        public ?Collection $meta = null
    ) {}
}
