<?php

declare(strict_types=1);

namespace LaravelLang\Config\Data\Shared;

use Spatie\LaravelData\Data;

class ModelFilterData extends Data
{
    public function __construct(
        public bool $enabled
    ) {}
}
