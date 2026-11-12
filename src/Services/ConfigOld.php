<?php

declare(strict_types=1);

namespace LaravelLang\Config\Services;

use Illuminate\Config\Repository;
use LaravelLang\Config\Data\HiddenData;

class ConfigOld
{
    public function __construct(
        protected Repository $config,
    ) {}

    public function hidden(): HiddenData {}
}
