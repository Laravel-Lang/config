<?php

declare(strict_types=1);

namespace LaravelLang\Config\Data\Shared;

use Illuminate\Support\Collection;
use LaravelLang\Config\Data\Translators\TranslatorChannelData;
use LaravelLang\Config\Data\Translators\TranslatorOptionsData;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;

class TranslatorsData extends Data
{
    public function __construct(
        #[DataCollectionOf(TranslatorChannelData::class)]
        public Collection $channels,
        public TranslatorOptionsData $options,
    ) {}
}
