<?php

declare(strict_types=1);

use LaravelLang\LocaleList\Locale;

dataset('punctuation locales', [
    Locale::French->value,
    Locale::Russian->value,
    Locale::Ukrainian->value,
    Locale::Belarusian->value,
]);
