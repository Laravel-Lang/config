<?php

declare(strict_types=1);

return [
    /*
     * This option contains a list of translators that the Laravel Lang Translator project works with.
     *
     * Google Translate is enabled by default.
     *
     * @see https://laravel-lang.com/configuration.html#translators
     */

    'translators' => [
        /*
         * List of channels used for translations.
         *
         * By default,
         *
         *     Google is enabled
         *     Deepl  is disabled
         *     Yandex is disabled
         */

        'channels' => [
            'google' => [
                'translator' => '\LaravelLang\Translator\Integrations\Google',

                'enabled'  => (bool) env('TRANSLATION_GOOGLE_ENABLED', true),
                'priority' => (int) env('TRANSLATION_GOOGLE_PRIORITY', 1),
            ],

            'deepl' => [
                'translator' => '\LaravelLang\Translator\Integrations\Deepl',

                'enabled'  => (bool) env('TRANSLATION_DEEPL_ENABLED', false),
                'priority' => (int) env('TRANSLATION_DEEPL_PRIORITY', 2),

                'credentials' => [
                    'key' => (string) env('TRANSLATION_DEEPL_KEY'),
                ],
            ],

            'yandex' => [
                'translator' => '\LaravelLang\Translator\Integrations\Yandex',

                'enabled'  => (bool) env('TRANSLATION_YANDEX_ENABLED', false),
                'priority' => (int) env('TRANSLATION_YANDEX_PRIORITY', 3),

                'credentials' => [
                    'key'    => (string) env('TRANSLATION_YANDEX_KEY'),
                    'folder' => (string) env('TRANSLATION_YANDEX_FOLDER_ID'),
                ],
            ],
        ],

        'options' => [
            /*
             * Set a custom pattern for extracting replaceable keywords from the string,
             * default to extracting words prefixed with a colon.
             *
             *  Available options:
             *
             *     `true` is a `/:(\w+)/`
             *     `false` will disable regular expression processing
             *      `/any regex/` - any regular expression you specify
             *
             *   By default, `true`
             *
             * @example (e.g. "Hello :name" will extract "name")
             */

            'preserve_parameters' => true,
        ],
    ],
];
