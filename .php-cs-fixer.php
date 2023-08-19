<?php

$files = PhpCsFixer\Finder::create()
    ->in([__DIR__ . '/app'])
;

return (new PhpCsFixer\Config())
    ->setRules([
        '@PER-CS1.0:risky' => true,
        'strict_param' => true,
        'array_syntax' => [
            'syntax' => 'short',
        ],
    ])
    ->setCacheFile(__DIR__ . '/storage/app/.php-cs-fixer.cache')
    ->setFinder($files)
;
