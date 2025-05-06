<?php

declare(strict_types=1);

namespace LaravelLang\Config\Data\Translators;

use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class TranslatorOptionsData extends Data
{
    public function __construct(
        public bool $preserveParameters,
    ) {}
}
