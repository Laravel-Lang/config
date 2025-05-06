<?php

declare(strict_types=1);

namespace LaravelLang\Config\Data\Shared;

use LaravelLang\Config\Data\Shared\Routes\RouteGroupData;
use LaravelLang\Config\Data\Shared\Routes\RouteNameData;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class RouteData extends Data
{
    public function __construct(
        public RouteNameData $names,
        public string $namePrefix,
        public bool $redirectDefault,
        public bool $hideDefault,
        public RouteGroupData $group,
    ) {}
}
