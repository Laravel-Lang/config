<?php

declare(strict_types=1);

namespace LaravelLang\Config\Data\Punctiation;

use Illuminate\Container\Attributes\Config;

final readonly class QuoteData
{
    public function __construct(
        #[Config('localization_punctuation.common.double_quote_opener')]
        public string $doubleOpener,
        #[Config('localization_punctuation.common.double_quote_closer')]
        public string $doubleCloser,
        #[Config('localization_punctuation.common.single_quote_opener')]
        public string $singleOpener,
        #[Config('localization_punctuation.common.single_quote_closer')]
        public string $singleCloser,
    ) {}
}
