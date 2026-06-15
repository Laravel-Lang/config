<?php

declare(strict_types=1);

namespace LaravelLang\Config\Data;

use Illuminate\Container\Attributes\Config;

final readonly class ModelData
{
    public function __construct(
        #[Config('localization_models.suffix')]
        public string $suffix,
        #[Config('localization_models.directory')]
        public string $directory,
        #[Config('localization_models.filter_enabled')]
        public bool $filterEnabled,
        #[Config('localization_models.helpers')]
        public string $helpers,
    ) {}
}
