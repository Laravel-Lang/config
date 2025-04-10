<?php

declare(strict_types=1);

namespace LaravelLang\Config\Enums;

use ArchTech\Enums\InvokableCases;

/**
 * @method static string Config()
 * @method static string Hidden()
 * @method static string Shared()
 */
enum Name: string
{
    use InvokableCases;

    case Shared = 'localization';
    case Hidden = 'localization-private';
    case Config = 'localization-config';
}
