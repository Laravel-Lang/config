<?php

declare(strict_types=1);

namespace LaravelLang\Config\Data;

final readonly class ConfigData
{
    public function __construct(
        public MainData $main,
        public ModelData $model,
        public PunctuationData $punctuation,
        public RouteData $route,
    ) {}
}
