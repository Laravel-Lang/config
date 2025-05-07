<?php

declare(strict_types=1);

namespace LaravelLang\Config\Helpers;

use function config;
use function in_array;
use function realpath;

class LaravelDataHelper
{
    protected static array $initialized = [];

    public static function initialize(string $path): void
    {
        if (static::$initialized[$path] ?? false) {
            return;
        }

        if (! static::has($path, $directories = static::directories())) {
            static::push($path, $directories);
        }

        static::$initialized[$path] = true;
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
}
