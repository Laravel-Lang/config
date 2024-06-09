<?php

declare(strict_types=1);

use LaravelLang\LocaleList\Locale;

return [
    /*
     * Determines what type of files to use when updating language files.
     *
     * `true` means inline files will be used.
     * `false` means that default files will be used.
     *
     * For example, the difference between them can be seen here:
     *
     * The :attribute must be accepted. // default
     * This field must be accepted.     // inline
     *
     * By default, `false`.
     */

    'inline' => (bool) env('LOCALIZATION_INLINE', env('LANG_PUBLISHER_INLINE')),

    /*
     * Do arrays need to be aligned by keys before processing arrays?
     *
     * By default, true
     */

    'align' => (bool) env('LOCALIZATION_ALIGN', env('LANG_PUBLISHER_ALIGN', true)),

    /*
     * The language codes chosen for the files in this repository may not
     * match the preferences for your project.
     *
     * Specify here mappings of localizations with your project.
     */

    'aliases' => [
        // \LaravelLang\LocaleList\Locale::German->value => 'de-DE',
        // \LaravelLang\LocaleList\Locale::GermanSwitzerland->value => 'de-CH',
    ],

    /*
     * This option determines the mechanism for converting translation
     * keys into a typographic version.
     *
     * For example,
     * for `false`: "It's super-configurable... -- just like this one!"
     * for `true`: “It’s super-configurable… – just like this one!”
     *
     * By default, false
     */

    'smart_punctuation' => [
        'enable' => (bool) env('LOCALIZATION_SMART_ENABLED', false),

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

    // This option defines settings for working with routing.

    'routes' => [
        // This option defines the names of the keys for application localization.

        'names' => [
            /*
             * This option specifies the name of the localization parameter used in the URL.
             *
             * For example:
             *
             *   app('router')->get('foo/{locale}', fn () => ...)
             *
             * By default, `locale`.
             */

            'parameter' => 'locale',

            /*
             * This option specifies the name of the localization parameter used in request headers.
             *
             * By default, `X-Localization`.
             */

            'header' => 'X-Localization',

            /*
             * This option specifies the name of the localization parameter used in request cookies.
             *
             * By default, `X-Localization`.
             */

            'cookie' => 'X-Localization',

            /*
             * This option specifies the name of the localization parameter used in request session.
             *
             * By default, `X-Localization`.
             */

            'session' => 'X-Localization',
        ],
    ],
];
