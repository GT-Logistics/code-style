<?php

declare(strict_types=1);

/*
 * Copyright (C) 2024 GT+ Logistics.
 */

use Gtlogistics\CodeStyle\Set\SetList;
use PhpCsFixer\Fixer\Comment\HeaderCommentFixer;
use Symplify\EasyCodingStandard\Config\ECSConfig;

return ECSConfig::configure()
    ->withSets([SetList::GT_LOGISTICS])
    ->withPaths([
        __DIR__ . '/config',
        __DIR__ . '/src',
    ])
    ->withRootFiles()
    ->withConfiguredRule(HeaderCommentFixer::class, ['header' => 'Copyright (C) 2024 GT+ Logistics.'])
    ->withCache(__DIR__ . '/.ecs.cache')
;
