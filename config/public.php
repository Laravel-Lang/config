<?php

declare(strict_types=1);

use LaravelLang\LocaleList\Locale;

return [
    /*
     * Determines what type of files to use when updating language files.
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

    'routes' => [
        /*
         * This option defines the settings for the key names used when working with application routing.
         *
         * Default values:
         *
         *   parameter - locale
         *   header    - X-Localization
         *   cookie    - X-Localization
         *   session   - X-Localization
         */

        'names' => [
            'parameter' => 'locale',
            'header'    => 'X-Localization',
            'cookie'    => 'X-Localization',
            'session'   => 'X-Localization',
        ],
    ],
];
