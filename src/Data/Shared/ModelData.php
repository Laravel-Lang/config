<?php

declare(strict_types=1);

namespace LaravelLang\Config\Data\Shared;

use Spatie\LaravelData\Data;

class ModelData extends Data
{
    public function __construct(
        public string $suffix,
        public string $directory,
        public string $helpers,
        public ModelFilterData $filter,
    ) {}
}
