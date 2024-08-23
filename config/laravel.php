<?php

declare(strict_types=1);

/*
 * Copyright (C) 2024 GT+ Logistics.
 */

use Gtlogistics\CodeStyle\Set\SetList;
use Symplify\EasyCodingStandard\Config\ECSConfig;

return ECSConfig::configure()
    ->withPaths([
        __DIR__ . '/app',
        __DIR__ . '/config',
        __DIR__ . '/tests',
        __DIR__ . '/routes',
        __DIR__ . '/database',
        __DIR__ . '/bootstrap',
    ])
    ->withRootFiles()
    ->withSets([SetList::GT_LOGISTICS])
    ->withSkip([
        __DIR__ . '/bootstrap/cache',
    ])
    ->withCache(__DIR__ . '/.ecs.cache')
;
