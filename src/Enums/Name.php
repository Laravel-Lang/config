<?php

declare(strict_types=1);

namespace LaravelLang\Config\Enums;

enum Name: string
{
    case Main        = 'localization';
    case Models      = 'localization_models';
    case Punctuation = 'localization_punctuation';
    case Routes      = 'localization_routes';
}
