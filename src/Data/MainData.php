<?php

declare(strict_types=1);

namespace LaravelLang\Config\Data;

use Illuminate\Container\Attributes\Config;

final readonly class MainData
{
    public function __construct(
        #[Config('localization.style')]
        public string $style,
        #[Config('localization.inline')]
        public bool $inline,
        #[Config('localization.aliases')]
        public array $aliases,
    ) {}
}
