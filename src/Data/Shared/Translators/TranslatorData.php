<?php

declare(strict_types=1);

namespace LaravelLang\Config\Data\Shared\Translators;

use Spatie\LaravelData\Data;

class TranslatorData extends Data
{
    public bool $enabled;

    public string $translator;

    public array $credentials = [];

    public int $priority = 0;
}
