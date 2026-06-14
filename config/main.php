<?php

declare(strict_types=1);

return [
    /**
     * Defines the localization style.
     *
     * Available options: formal, informal.
     *
     * Example:
     *
     * ```
     * formal:   Bitte bestätigen Sie Ihre E-Mail-Adresse.
     * informal: Bitte bestätige deine E-Mail-Adresse.
     * ```
     *
     * By default, formal
     */

    'style' => 'formal',

    /*
     * Determines what type of files to use when updating language files.
     *
     * @see https://laravel-lang.com/configuration.html#inline
     *
     * By default, `false`.
     */

    'inline' => (bool) env('LOCALIZATION_INLINE', false),

    /*
     * The language codes chosen for the files in this repository may not
     * match the preferences for your project.
     *
     * Specify here mappings of localizations with your project.
     *
     * @see https://laravel-lang.com/configuration.html#aliases
     */

    'aliases' => [
        // \LaravelLang\LocaleList\Locale::German->value => 'de-DE',
        // \LaravelLang\LocaleList\Locale::GermanSwitzerland->value => 'de-CH',
    ],
];
