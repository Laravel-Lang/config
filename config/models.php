<?php

declare(strict_types=1);

return [
    /*
     * This option defines settings for working with model translations.
     *
     * @see https://laravel-lang.com/configuration.html#models
     */

    'models' => [
        /*
         * This option specifies a suffix for models containing translations.
         *
         * For example,
         *   main model is `App\Models\Page`
         *   translation model is `App\Models\PageTranslation`
         *
         * By default, `Translation`
         */

        'suffix' => 'Translation',

        /*
         * This option determines the need to filter localizations loaded
         * in the relay when using eager loading.
         *
         * By default, true.
         */

        'filter' => [
            'enabled' => (bool) env('LOCALIZATION_FILTER_ENABLED', true),
        ],

        /*
         * This option specifies a folder to store helper files for the IDE.
         *
         * By default, `vendor/_laravel_lang`
         */

        'helpers' => env('VENDOR_PATH', base_path('vendor/_laravel_lang')),
    ],
];
