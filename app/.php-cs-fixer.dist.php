<?php

$finder = (new PhpCsFixer\Finder())
    ->in(__DIR__)
    ->exclude('framework/var')
;

return (new PhpCsFixer\Config())
    ->setRules([
        '@Symfony' => true,
        'strict_param' => true,
        'declare_strict_types' => true,
        'strict_comparison' => true,
        'array_syntax' => ['syntax' => 'short'],
    ])
    ->setFinder($finder)
;
