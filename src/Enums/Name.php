<?php

declare(strict_types=1);

namespace LaravelLang\Config\Enums;

use ArchTech\Enums\InvokableCases;

/**
 * @method static string All()
 * @method static string Main()
 * @method static string Models()
 * @method static string Punctuation()
 * @method static string Routes()
 * @method static string Translators()
 * @method static string Hidden()
 */
enum Name: string
{
    use InvokableCases;

    case All         = 'localization-all';
    case Main        = 'localization';
    case Models      = 'localization-models';
    case Routes      = 'localization-routes';
    case Punctuation = 'localization-punctuation';
    case Translators = 'localization-translators';
    case Hidden      = 'localization-private';
}
