<?php

declare(strict_types=1);

namespace LaravelLang\Config\Data;

use Illuminate\Container\Attributes\Config;
use LaravelLang\Config\Data\Punctiation\QuoteData;

use function array_map;
use function config;

final readonly class PunctuationData
{
    public QuoteData $common;

    /** @var array<string, QuoteData> */
    public array $locales;

    public function __construct(
        #[Config('localization_punctuation.enabled')]
        public bool $enabled,
    ) {
        $this->common  = $this->common();
        $this->locales = $this->locales();
    }

    protected function common(): QuoteData
    {
        return new QuoteData(
            doubleOpener: config()->string('localization_punctuation.common.double_quote_opener'),
            doubleCloser: config()->string('localization_punctuation.common.double_quote_closer'),
            singleOpener: config()->string('localization_punctuation.common.single_quote_opener'),
            singleCloser: config()->string('localization_punctuation.common.single_quote_closer'),
        );
    }

    protected function locales(): array
    {
        return array_map(
            fn (array $item): QuoteData => new QuoteData(
                doubleOpener: $item['double_quote_opener'] ?? $this->common->doubleOpener,
                doubleCloser: $item['double_quote_closer'] ?? $this->common->doubleCloser,
                singleOpener: $item['single_quote_opener'] ?? $this->common->singleOpener,
                singleCloser: $item['single_quote_closer'] ?? $this->common->singleCloser,
            ),
            config()->array('localization_punctuation.locales')
        );
    }
}
