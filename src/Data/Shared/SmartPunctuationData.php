<?php

declare(strict_types=1);

namespace LaravelLang\Config\Data\Shared;

use LaravelLang\Config\Data\Common\NonPushableData;
use Spatie\LaravelData\Data;

class SmartPunctuationData extends Data
{
    public bool $enabled;

    public array $common;

    public NonPushableData $locales;
}
