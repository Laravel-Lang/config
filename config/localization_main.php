<?php

declare(strict_types=1);

return [
    /*
     * Lists the translation styles in the order they are applied to each dictionary.
     * Later styles override matching keys from earlier styles. If `default` is
     * omitted, Publisher adds it at the beginning.
     */

    'styles' => [
        'default',
        'inline',
    ],

    /*
     * Maps canonical locale codes to aliases used by your application.
     * Published translations use the canonical codes.
     *
     * @see https://laravel-lang.com/configure#locale-aliases
     */

    'aliases' => [
        // \LaravelLang\LocaleList\Locale::German->value => 'de-DE',
        // \LaravelLang\LocaleList\Locale::GermanSwitzerland->value => 'de-CH',
    ],

    /*
     * Excludes source files, style dictionaries, and publication targets from publishing.
     * Use `*` wildcards in case-insensitive patterns matched against full paths
     * with `/` separators.
     * These exclusions take precedence over `force`.
     */

    'skip' => [
        // '*/http-statuses.php',
        // '*some/package/*',
    ],

    /*
     * Lists Composer package names that bypass the dependency, version, and root
     * project name checks when Publisher reads translation manifests.
     */

    'force' => [
        // 'some/package',
    ],
];
