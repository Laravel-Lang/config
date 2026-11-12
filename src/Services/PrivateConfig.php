<?php

declare(strict_types=1);

namespace LaravelLang\Config\Services;

use Illuminate\Container\Attributes\Config;

/** @deprecated */
class PrivateConfig
{
    public function __construct(
        #[Config('localization_private.plugins')]
        public array $plugins,
        #[Config('localization_private.packages')]
        public array $packages,
    ) {}
}
