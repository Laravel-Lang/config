<?php

declare(strict_types=1);

namespace LaravelLang\Config\Data\Shared;

use LaravelLang\Config\Data\Shared\Translators\TranslatorChannelsData;
use LaravelLang\Config\Data\Shared\Translators\TranslatorOptionsData;
use Spatie\LaravelData\Data;

class TranslatorsData extends Data
{
    public TranslatorChannelsData $channels;

    public TranslatorOptionsData $options;
}
