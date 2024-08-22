<?php

declare(strict_types=1);

/*
 * Copyright (C) 2024 GT+ Logistics.
 */

namespace Gtlogistics\CodeStyle\Util;

use Composer\Semver\VersionParser;

class ComposerUtil
{
    private VersionParser $parser;

    private static string $phpVersion;

    public function __construct(VersionParser $parser)
    {
        $this->parser = $parser;
    }

    public function satisfiesPhp(string $constraint): bool
    {
        $phpVersion = $this->getPhpVersion();

        $constraint = $this->parser->parseConstraints($constraint);
        $provided = $this->parser->parseConstraints($phpVersion);

        return $provided->matches($constraint);
    }

    private function getPhpVersion(): string
    {
        if (isset(self::$phpVersion)) {
            return self::$phpVersion;
        }

        $phpVersion = PHP_VERSION;
        $composerJsonPath = $this->findRootComposerJsonPath();
        if ($composerJsonPath) {
            $composerJson = json_decode(file_get_contents($composerJsonPath), true, 512, JSON_THROW_ON_ERROR);

            if ($composerPhpVersion = $composerJson['require']['php'] ?? null) {
                $constraint = $this->parser->parseConstraints($composerPhpVersion);

                $phpVersion = $constraint->getLowerBound()->getVersion();
            }
        }

        return self::$phpVersion = $phpVersion;
    }

    private function findRootComposerJsonPath(): ?string
    {
        $rootPath = dirname(__DIR__, 4) . '/composer.json';

        if (file_exists($rootPath)) {
            return $rootPath;
        }

        return dirname(__DIR__, 2) . '/composer.json';
    }
}
