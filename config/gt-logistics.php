<?php

declare(strict_types=1);

/*
 * Copyright (C) 2024 GT+ Logistics.
 */

use PhpCsFixer\Fixer\ConstantNotation\NativeConstantInvocationFixer;
use PhpCsFixer\Fixer\ControlStructure\NoAlternativeSyntaxFixer;
use PhpCsFixer\Fixer\ControlStructure\TrailingCommaInMultilineFixer;
use PhpCsFixer\Fixer\ControlStructure\YodaStyleFixer;
use PhpCsFixer\Fixer\FunctionNotation\NativeFunctionInvocationFixer;
use PhpCsFixer\Fixer\FunctionNotation\UseArrowFunctionsFixer;
use PhpCsFixer\Fixer\Operator\ConcatSpaceFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocAlignFixer;
use PhpCsFixer\Fixer\Semicolon\MultilineWhitespaceBeforeSemicolonsFixer;
use PhpCsFixer\Fixer\Strict\DeclareStrictTypesFixer;
use PhpCsFixer\Fixer\Whitespace\ArrayIndentationFixer;
use PhpCsFixer\Fixer\Whitespace\HeredocIndentationFixer;
use Symplify\EasyCodingStandard\Config\ECSConfig;

$phpVersion = PHP_VERSION_ID / 100;
$supportsTrailingComma = ['arguments', 'arrays'];

if ($phpVersion >= 800) {
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
        $phpVersion <= 704,
        $phpVersion <= 704,
        $phpVersion <= 800,
        $phpVersion <= 803,
        $phpVersion <= 801,
        $phpVersion <= 802,
        $phpVersion <= 803,
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
    ])
    ->withConfiguredRule(ConcatSpaceFixer::class, ['spacing' => 'one'])
    ->withConfiguredRule(HeredocIndentationFixer::class, ['indentation' => 'same_as_start'])
    ->withConfiguredRule(NoAlternativeSyntaxFixer::class, ['fix_non_monolithic_code' => false])
    ->withConfiguredRule(MultilineWhitespaceBeforeSemicolonsFixer::class, ['strategy' => 'new_line_for_chained_calls'])
    ->withConfiguredRule(PhpdocAlignFixer::class, ['align' => 'left'])
    ->withConfiguredRule(TrailingCommaInMultilineFixer::class, ['elements' => $supportsTrailingComma])
    ->withConfiguredRule(YodaStyleFixer::class, ['equal' => false, 'identical' => false, 'less_and_greater' => false, 'always_move_variable' => false])
    ->withSkip([
        DeclareStrictTypesFixer::class,
        NativeConstantInvocationFixer::class,
        NativeFunctionInvocationFixer::class,
        UseArrowFunctionsFixer::class,
    ])
;
