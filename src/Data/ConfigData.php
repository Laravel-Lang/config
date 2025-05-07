<?php

declare(strict_types=1);

namespace LaravelLang\Config\Data;

use LaravelLang\Config\Data\Shared\MainData;
use LaravelLang\Config\Data\Shared\ModelData;
use LaravelLang\Config\Data\Shared\PunctuationData;
use LaravelLang\Config\Data\Shared\RouteData;
use LaravelLang\Config\Data\Shared\TranslatorData;
use Spatie\LaravelData\Data;

class ConfigData extends Data
{
    public function __construct(
        public MainData $main,
        public ModelData $models,
        public RouteData $routes,
        public PunctuationData $punctuation,
        public TranslatorData $translators,
        public HiddenData $hidden,
    ) {}
}
