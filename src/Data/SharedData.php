<?php

declare(strict_types=1);

namespace LaravelLang\Config\Data;

use LaravelLang\Config\Data\Shared\ModelsData;
use LaravelLang\Config\Data\Shared\RoutesData;

class SharedData
{
    public function __construct(
        public RoutesData $routes,
        public ModelsData $models,
    ) {}
}
