<?php

declare(strict_types=1);

namespace LaravelLang\Config\Data;

use LaravelLang\Config\Concerns\HasValues;

class NonPushableData
{
    use HasValues;

    public function __construct(
        protected readonly string $key,
        protected readonly ?string $default = null
    ) {}

    public function all(): array
    {
        return config($this->key, config($this->default, []));
    }
}
