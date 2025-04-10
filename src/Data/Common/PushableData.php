<?php

declare(strict_types=1);

namespace LaravelLang\Config\Data\Common;

use BackedEnum;
use LaravelLang\Config\Concerns\HasValues;
use Spatie\LaravelData\Data;

use function config;

class PushableData extends Data
{
    use HasValues;

    protected string $key;

    protected ?string $default = null;

    public function toArray(): array
    {
        return $this->value($this->key, $this->default);
    }

    public function push(mixed $value): static
    {
        config()->push($this->key, $value);

        return $this;
    }

    public function set(BackedEnum|int|string $key, mixed $value): mixed
    {
        $stored = config($this->key);

        $stored[$this->resolveKey($key)] = $value;

        config()->set($this->key, $stored);

        return $stored;
    }
}
