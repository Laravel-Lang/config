<?php

declare(strict_types=1);

namespace LaravelLang\Config\Data\Shared;

class ModelsData
{
    public function __construct(
        public int $flags,
        public string $helpers
    ) {}
}
