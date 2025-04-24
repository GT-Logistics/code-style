<?php

declare(strict_types=1);

/*
 * Copyright (C) 2024 GT+ Logistics.
 */

use Gtlogistics\CodeStyle\Set\SetList;
use PhpCsFixer\Fixer\Operator\NotOperatorWithSuccessorSpaceFixer;
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
    ->withPreparedSets(
        false,
        false,
        false,
        true,
    )
    ->withSets([SetList::GT_LOGISTICS])
    ->withSkip([
        NotOperatorWithSuccessorSpaceFixer::class,
    ])
    ->withCache($workingDir . '/.ecs.cache')
    ->withSkip([
        $workingDir . 'bootstrap/cache',
        $workingDir . 'build',
        $workingDir . 'node_modules',
        $workingDir . 'storage',
    ])
;
