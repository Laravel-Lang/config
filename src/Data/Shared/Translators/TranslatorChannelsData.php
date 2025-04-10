<?php

declare(strict_types=1);

namespace LaravelLang\Config\Data\Shared\Translators;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;

class TranslatorChannelsData extends Data
{
    #[DataCollectionOf(TranslatorData::class)]
    public Collection $all;

    #[DataCollectionOf(TranslatorData::class)]
    public Collection $enabled;
}
