<?php

declare(strict_types=1);

namespace LaravelLang\Config\Services;

use Illuminate\Container\Attributes\Config;

readonly class ModelConfig
{
    public function __construct(
        #[Config('localization_models.suffix')]
        public string $suffix,
        #[Config('localization_models.filter')]
        public bool $filter,
        #[Config('localization_models.helpers')]
        public string $helpers,
    ) {}
}
