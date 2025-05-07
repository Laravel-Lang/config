<?php

declare(strict_types=1);

namespace LaravelLang\Config\Helpers;

use function config;
use function in_array;
use function realpath;

class LaravelDataHelper
{
    protected static bool $initialized = false;

    public static function initialize(): void
    {
        if (static::$initialized) {
            return;
        }

        $path        = static::path();
        $directories = static::directories();

        if (! static::has($path, $directories)) {
            static::push($path, $directories);
        }

        static::$initialized = true;
    }

    protected static function has(string $path, array $directories): bool
    {
        return in_array($path, static::normalize($directories), true);
    }

    protected static function normalize(array $directories): array
    {
        foreach ($directories as &$directory) {
            $directory = realpath($directory);
        }

        return $directories;
    }

    protected static function directories(): array
    {
        return config('data.structure_caching.directories') ?: [];
    }

    protected static function push(string $path, array $directories): void
    {
        $directories[] = $path;

        config()?->set('data.structure_caching.directories', $directories);
    }

    protected static function path(): string
    {
        return realpath(__DIR__ . '/../Data');
    }
}
