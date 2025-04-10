<?php

declare(strict_types=1);

namespace LaravelLang\Config\Data\Common;

use LaravelLang\Config\Concerns\HasValues;
use Spatie\LaravelData\Data;

class NonPushableData extends Data
{
    use HasValues;

    protected string $key;

    protected ?string $default = null;

    public function toArray(): array
    {
        return $this->value($this->key, $this->default);
    }
}
