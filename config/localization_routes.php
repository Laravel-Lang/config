<?php

declare(strict_types=1);

/**
 * This option defines the application's route settings.
 *
 * @see https://laravel-lang.com/20.x/routes
 */

use LaravelLang\Config\Constants\RouteName;
use LaravelLang\Routes\Middlewares\LocalizationByCookieMiddleware;
use LaravelLang\Routes\Middlewares\LocalizationByHeaderMiddleware;
use LaravelLang\Routes\Middlewares\LocalizationByModelMiddleware;
use LaravelLang\Routes\Middlewares\LocalizationByParameterPrefixMiddlewareMiddleware;
use LaravelLang\Routes\Middlewares\LocalizationBySessionMiddleware;

return [
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
     * Also, use `''` instead of `null`.
     *
     * By default, `localized.`
     */

    'prefix' => env('LOCALIZATION_PREFIX', 'localized.'),

    /*
     * This option specifies the request redirection option when trying to open the default localization.
     *
     * Applies when using the `LaravelLang\Routes\Facades\LocalizationRoute` facade.
     */

    'redirect' => (bool) env('LOCALIZATION_REDIRECT', false),

    /*
     * This option defines the default localization, when used, the localization parameter will be removed from the URL.
     *
     * Applies when using the `localizedRoute` helper.
     */

    'hide' => (bool) env('LOCALIZATION_HIDE', false),

    'middlewares' => [
        // This option contains settings for routes without the prefix of the localization code.

        'default' => [
            LocalizationByCookieMiddleware::class,
            LocalizationByHeaderMiddleware::class,
            LocalizationBySessionMiddleware::class,
            LocalizationByModelMiddleware::class,
        ],

        // This option contains settings for routes with the prefix of the localization code.

        'prefix' => [
            LocalizationByParameterPrefixMiddlewareMiddleware::class,
            LocalizationByCookieMiddleware::class,
            LocalizationByHeaderMiddleware::class,
            LocalizationBySessionMiddleware::class,
            LocalizationByModelMiddleware::class,
        ],
    ],
];
