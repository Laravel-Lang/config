<?php

declare(strict_types=1);

namespace LaravelLang\Config\Data\SmartPunctuation;

use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class PunctuationItemData extends Data
{
    public function __construct(
        public string $doubleQuoteOpener,
        public string $doubleQuoteCloser,
        public string $singleQuoteOpener,
        public string $singleQuoteCloser,
    ) {}
}
