<?php

declare(strict_types=1);

namespace LaravelLang\Config\Data;

class PushableData
{
    public function __construct(
        public array $items
    ) {
    }

    public function get(): array
    {
        return $this->items;
    }

    public function push(mixed $value): static
    {
        $this->items[] = $value;

        return $this;
    }

    public function set(int | string $key, mixed $value): static
    {
        $this->items[$key] = $value;

        return $this;
    }
}
