<?php

declare(strict_types=1);

/*
 * Copyright (C) 2024 GT+ Logistics.
 */

use Gtlogistics\CodeStyle\Set\SetList;
use Symplify\EasyCodingStandard\Config\ECSConfig;

$workingDir = getcwd();

return ECSConfig::configure()
    ->withPaths([
        $workingDir . '/app',
        $workingDir . '/config',
        $workingDir . '/tests',
        $workingDir . '/routes',
        $workingDir . '/database',
        $workingDir . '/bootstrap',
    ])
    ->withRootFiles()
    ->withSets([SetList::GT_LOGISTICS])
    ->withSkip([
        $workingDir . '/bootstrap/cache',
    ])
    ->withCache($workingDir . '/.ecs.cache')
;
