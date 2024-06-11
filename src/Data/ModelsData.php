<?php

declare(strict_types=1);

namespace LaravelLang\Config\Data;

class ModelsData
{
    public function __construct(
        public ?string $connection,
        public string $table,
        public int $flags,
        public string $helpers
    ) {}
}
