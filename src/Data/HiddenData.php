<?php

declare(strict_types=1);

namespace LaravelLang\Config\Data;

class HiddenData
{
    public function __construct(
        public PushableData $plugins,
        public PushableData $packages,
        public NonPushableData $map,
    ) {}
}
