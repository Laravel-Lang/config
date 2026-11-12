<?php

declare(strict_types=1);

namespace LaravelLang\Config\Data;

use LaravelLang\Config\Data\Shared\ModelsData;

class SharedData
{
    public function __construct(
        public ModelsData $models,
    ) {}
}
