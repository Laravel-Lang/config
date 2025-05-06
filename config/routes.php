<?php

declare(strict_types=1);

/**
 * This option defines the application's route settings.
 *
 * @see https://laravel-lang.com/configuration.html#routes
 */

use LaravelLang\Config\Constants\RouteName;

return [
    'routes' => [
        /*
         * This option defines the settings for the key names used when working with application routing.
         *
         * Default values:
         *
         *   parameter - locale
         *   header    - Accept-Language
         *   cookie    - Accept-Language
         *   session   - Accept-Language
         *   column    - column
         */

        'names' => [
            'parameter' => RouteName::Parameter,
            'header'    => RouteName::Header,
            'cookie'    => RouteName::Cookie,
            'session'   => RouteName::Session,
            'column'    => RouteName::Column,
        ],

        /*
         * This option specifies the prefix of route group names.
         *
         * By default, `localized.`
         */

        'name_prefix' => env('LOCALIZATION_NAME_PREFIX', 'localized.'),

        /*
         * This option specifies the request redirection option when trying to open the default localization.
         *
         * Applies when using the `LaravelLang\Routes\Facades\LocalizationRoute` facade.
         */

        'redirect_default' => (bool) env('LOCALIZATION_REDIRECT_DEFAULT', false),

        /*
         * This option defines the default localization, when used, the localization parameter will be removed from the URL.
         *
         * Applies when using the `localizedRoute` helper.
         */

        'hide_default' => (bool) env('LOCALIZATION_HIDE_DEFAULT', false),

        // This option contains settings for routes.

        'group' => [
            'middlewares' => [
                // This option contains settings for routes without the prefix of the localization code.

                'default' => [
                    LaravelLang\Routes\Middlewares\LocalizationByCookie::class,
                    LaravelLang\Routes\Middlewares\LocalizationByHeader::class,
                    LaravelLang\Routes\Middlewares\LocalizationBySession::class,
                    LaravelLang\Routes\Middlewares\LocalizationByModel::class,
                ],

                // This option contains settings for routes with the prefix of the localization code.

                'prefix' => [
                    LaravelLang\Routes\Middlewares\LocalizationByParameterPrefix::class,
                    LaravelLang\Routes\Middlewares\LocalizationByCookie::class,
                    LaravelLang\Routes\Middlewares\LocalizationByHeader::class,
                    LaravelLang\Routes\Middlewares\LocalizationBySession::class,
                    LaravelLang\Routes\Middlewares\LocalizationByModel::class,
                ],
            ],
        ],
    ],
];
