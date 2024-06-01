<?php

declare(strict_types=1);

namespace LaravelLang\Config\Concerns;

use BackedEnum;

trait HasValues
{
    use HasKey;

    public function get(BackedEnum|int|string $key): mixed
    {
        $key = $this->resolveKey($key);

        $main    = $this->key . '.' . $key;
        $default = $this->default ? $this->default . '.' . $key : null;

        return $this->value($main, $default);
    }

    protected function value(string $key, ?string $default = null): mixed
    {
        return $default
            ? config()->get($key, config()->get($default))
            : config()->get($key);
    }
}
