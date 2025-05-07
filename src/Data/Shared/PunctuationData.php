<?php

declare(strict_types=1);

namespace LaravelLang\Config\Data\Shared;

use Illuminate\Support\Collection;
use LaravelLang\Config\Data\SmartPunctuation\PunctuationItemData;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;

class PunctuationData extends Data
{
    public function __construct(
        public bool $enabled,
        public PunctuationItemData $common,
        #[DataCollectionOf(PunctuationItemData::class)]
        public Collection $locales,
    ) {}
}
