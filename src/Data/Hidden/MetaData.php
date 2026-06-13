<?php

declare(strict_types=1);

namespace LaravelLang\Config\Data\Hidden;

use LaravelLang\LocaleList\Direction;
use Spatie\LaravelData\Data;

class MetaData extends Data
{
    public function __construct(
        public string $type,
        public string $regional,
        public Direction $direction = Direction::LeftToRight,
    ) {}
}
