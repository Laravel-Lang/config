<?php

declare(strict_types=1);

return [
    /*
     * Определяет порядок применения стилей переводов.
     * 
     * Объединение происходит по правилам функции `array_merge()`.
     * 
     * Стиль `default` применяется всегда в качестве базового.
     */

    'styles' => [
        'default',
        'inline',
    ],

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

    /*
     * Позволяет исключать из обработки файлы и папки по маске.
     * 
     * Применяется как к исходным файлам, так и к целевым.
     * 
     * Имеет приоритет над `force`.
     */

    'skip' => [
        '*/http-statuses.php',
        '*some/package/*',
    ],
];
