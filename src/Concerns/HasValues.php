<?php

declare(strict_types=1);

namespace LaravelLang\Config\Concerns;

use BackedEnum;

trait HasValues
{
    use HasKey;

    public function get(BackedEnum|int|string $key): mixed
    {
        if (! is_null($this->default)) {
            $default = $this->default . '.' . $this->resolveKey($key);
        }

        return $this->value($this->key . '.' . $this->resolveKey($key), $default ?? null);
    }

    protected function value(string $key, ?string $default = null): mixed
    {
        return $default
            ? config()->get($key, config()->get($default))
            : config()->get($key);
    }
}
