<?php

declare(strict_types=1);

/**
 * This option determines the mechanism for converting translation
 * keys into a typographic version.
 *
 * @see https://laravel-lang.com/configuration.html#punctuation
 *
 * By default, false
 */

use LaravelLang\LocaleList\Locale;

return [
    'punctuation' => [
        'enabled' => (bool) env('LOCALIZATION_PUNCTUATION_ENABLED', false),

        'common' => [
            'double_quote_opener' => '“',
            'double_quote_closer' => '”',
            'single_quote_opener' => '‘',
            'single_quote_closer' => '’',
        ],

        'locales' => [
            Locale::French->value => [
                'double_quote_opener' => '«&nbsp;',
                'double_quote_closer' => '&nbsp;»',
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
    ],
];
