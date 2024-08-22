<?php

declare(strict_types=1);

/*
 * Copyright (C) 2024 GT+ Logistics.
 */

use Composer\Semver\VersionParser;
use Gtlogistics\CodeStyle\Util\ComposerUtil;
use PHP_CodeSniffer\Standards\PEAR\Sniffs\WhiteSpace\ObjectOperatorIndentSniff;
use PhpCsFixer\Fixer\ConstantNotation\NativeConstantInvocationFixer;
use PhpCsFixer\Fixer\ControlStructure\NoAlternativeSyntaxFixer;
use PhpCsFixer\Fixer\ControlStructure\TrailingCommaInMultilineFixer;
use PhpCsFixer\Fixer\ControlStructure\YodaStyleFixer;
use PhpCsFixer\Fixer\FunctionNotation\NativeFunctionInvocationFixer;
use PhpCsFixer\Fixer\FunctionNotation\UseArrowFunctionsFixer;
use PhpCsFixer\Fixer\Operator\ConcatSpaceFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocAlignFixer;
use PhpCsFixer\Fixer\Semicolon\MultilineWhitespaceBeforeSemicolonsFixer;
use PhpCsFixer\Fixer\Whitespace\ArrayIndentationFixer;
use PhpCsFixer\Fixer\Whitespace\HeredocIndentationFixer;
use Symplify\EasyCodingStandard\Config\ECSConfig;

$composerUtil = new ComposerUtil(new VersionParser());
$php74AndUp = $composerUtil->satisfiesPhp('>=7.4');
$php80AndUp = $composerUtil->satisfiesPhp('>=8.0');
$php81AndUp = $composerUtil->satisfiesPhp('>=8.1');
$php82AndUp = $composerUtil->satisfiesPhp('>=8.2');
$php83AndUp = $composerUtil->satisfiesPhp('>=8.3');

$supportsTrailingComma = ['arguments', 'arrays'];
if ($php80AndUp) {
    $supportsTrailingComma[] = 'match';
    $supportsTrailingComma[] = 'parameters';
}

return ECSConfig::configure()
    ->withPhpCsFixerSets(
        false,
        false,
        false,
        false,
        false,
        false,
        false,
        false,
        false,
        false,
        false,
        false,
        false,
        false,
        false,
        false,
        $php74AndUp,
        $php74AndUp,
        $php80AndUp,
        $php80AndUp,
        $php81AndUp,
        $php82AndUp,
        $php83AndUp,
        false,
        false,
        false,
        false,
        false,
        false,
        false,
        false,
        false,
        false,
        false,
        false,
        false,
        false,
        false,
        false,
        false,
        false,
        false,
        false,
        false,
        true,
        true,
    )
    ->withRules([
        ArrayIndentationFixer::class,
        ObjectOperatorIndentSniff::class,
    ])
    ->withConfiguredRule(ConcatSpaceFixer::class, ['spacing' => 'one'])
    ->withConfiguredRule(HeredocIndentationFixer::class, ['indentation' => 'same_as_start'])
    ->withConfiguredRule(NoAlternativeSyntaxFixer::class, ['fix_non_monolithic_code' => false])
    ->withConfiguredRule(MultilineWhitespaceBeforeSemicolonsFixer::class, ['strategy' => 'new_line_for_chained_calls'])
    ->withConfiguredRule(PhpdocAlignFixer::class, ['align' => 'left'])
    ->withConfiguredRule(TrailingCommaInMultilineFixer::class, ['elements' => $supportsTrailingComma])
    ->withConfiguredRule(YodaStyleFixer::class, ['equal' => false, 'identical' => false, 'less_and_greater' => false, 'always_move_variable' => false])
    ->withSkip([
        NativeConstantInvocationFixer::class,
        NativeFunctionInvocationFixer::class,
        UseArrowFunctionsFixer::class,
    ])
;
