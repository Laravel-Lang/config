<?php

declare(strict_types=1);

namespace LaravelLang\Config\Data\Hidden;

use Spatie\LaravelData\Data;

class ModelsData extends Data
{
    public function __construct(
        public string $directory
    ) {}
}
