<?php

declare(strict_types=1);

namespace LaravelLang\Config\Data\Shared\Translators;

use Spatie\LaravelData\Data;

class TranslatorOptionsData extends Data
{
    public bool|string $preserveParameters;
}
