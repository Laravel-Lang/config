<?php

declare(strict_types=1);

/*
 * Settings for Eloquent model translations.
 *
 * @see https://laravel-lang.com/models
 */

return [
    /*
     * Suffix appended to a model's class name to find or generate its translation model.
     * For example, `App\Models\Page` uses `App\Models\PageTranslation` by default.
     */

    'suffix' => 'Translation',

    /*
     * Limit the `translations()` relation to the current and fallback locales.
     * Disable filtering to query other locales through this relation.
     */

    'filter' => (bool) env('LOCALIZATION_FILTER_ENABLED', true),

    /*
     * Directories scanned for Eloquent models by `make:model-translation`
     * and `lang:models-helper`. Add paths for models outside `app/Models`.
     */

    'directories' => [
        app_path('Models'),
    ],

    /*
     * Directory for generated IDE helper files. Running `lang:models-helper`
     * without a model argument removes this directory before regenerating the files.
     */

    'helpers' => env('VENDOR_PATH', base_path('vendor/_laravel_lang')),
];
