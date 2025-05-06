<?php

declare(strict_types=1);

namespace LaravelLang\Config\Data;

use Spatie\LaravelData\Data;

class ConfigData extends Data
{
    public function __construct(
        public SharedData $shared,
        public HiddenData $hidden,
    ) {}
}
