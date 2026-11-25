<?php

declare(strict_types=1);

use LaravelLang\LocaleList\Locale;

return [
    /*
     * Enables typographic quotes, dashes, and ellipses when translations are published.
     */

    'enabled' => (bool) env('LOCALIZATION_PUNCTUATION_ENABLED', false),

    /*
     * Default opening and closing marks for double and single quotes.
     */

    'common' => [
        'double_quote_opener' => '“',
        'double_quote_closer' => '”',
        'single_quote_opener' => '‘',
        'single_quote_closer' => '’',
    ],

    /*
     * Quote mark overrides keyed by canonical locale code. Omitted marks use the
     * corresponding values from `common`.
     */

    'locales' => [
        Locale::French->value => [
            // Use U+00A0 escapes to make the non-breaking spaces visible in the config.
            // HTML entities would be written verbatim to the translation files.
            'double_quote_opener' => "«\u{a0}",
            'double_quote_closer' => "\u{a0}»",
            'single_quote_opener' => '‘',
            'single_quote_closer' => '’',
        ],

        Locale::Russian->value => [
            'double_quote_opener' => '«',
            'double_quote_closer' => '»',
            'single_quote_opener' => '‘',
            'single_quote_closer' => '’',
        ],

        Locale::Ukrainian->value => [
            'double_quote_opener' => '«',
            'double_quote_closer' => '»',
            'single_quote_opener' => '‘',
            'single_quote_closer' => '’',
        ],

        Locale::Belarusian->value => [
            'double_quote_opener' => '«',
            'double_quote_closer' => '»',
            'single_quote_opener' => '‘',
            'single_quote_closer' => '’',
        ],
    ],
];
