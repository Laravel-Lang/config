<?php

declare(strict_types=1);

namespace LaravelLang\Config\Data\Shared;

use Spatie\LaravelData\Data;

class ModelsData extends Data
{
    public string $suffix;

    public string $helpers;

    public ModelsFilterData $filter;
}
