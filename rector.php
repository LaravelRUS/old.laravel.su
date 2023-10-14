<?php

declare(strict_types=1);

use Rector\CodeQuality\Rector\Concat\JoinStringConcatRector;
use Rector\CodeQuality\Rector\Identical\FlipTypeControlToUseExclusiveTypeRector;
use Rector\CodingStyle\Rector\Assign\SplitDoubleAssignRector;
use Rector\CodingStyle\Rector\Catch_\CatchExceptionNameMatchingTypeRector;
use Rector\Config\RectorConfig;
use Rector\Doctrine\Set\DoctrineSetList;
use Rector\Php80\Rector\Class_\ClassPropertyAssignToConstructorPromotionRector;
use Rector\Php81\Rector\ClassConst\FinalizePublicClassConstantRector;
use Rector\Php81\Rector\Property\ReadOnlyPropertyRector;
use Rector\PHPUnit\Set\PHPUnitSetList;
use Rector\Privatization\Rector\Class_\FinalizeClassesWithoutChildrenRector;
use Rector\Privatization\Rector\MethodCall\PrivatizeLocalGetterToPropertyRector;
use Rector\Renaming\Rector\Name\RenameClassRector;
use Rector\Set\ValueObject\LevelSetList;
use Rector\Set\ValueObject\SetList;

return static function (RectorConfig $config): void {
    $config->paths([__DIR__ . '/app']);

    $config->sets([
        // CodeStyle
        SetList::TYPE_DECLARATION,
        SetList::PRIVATIZATION,
        // Lang/Frames
        LevelSetList::UP_TO_PHP_82,
        PHPUnitSetList::PHPUNIT_CODE_QUALITY,
        DoctrineSetList::DOCTRINE_CODE_QUALITY,
    ]);

    $config->cacheDirectory(__DIR__ . '/storage/app');

    $config->parallel(360);

    //$config->importNames();
    $config->importShortClasses(false);

    $config->skip([
        //
        // Do not replace classic properties to promoted eq. These are
        // completely different statements.
        //
        ClassPropertyAssignToConstructorPromotionRector::class,

        //
        // This rector can break the Doctrine that replaces implementations
        // with proxies, like:
        //  - private Collection $relation;          // OK This can be replaced with a proxy
        //  - private readonly Collection $relation; // FAIL
        //
        ReadOnlyPropertyRector::class,

        // Totally pointless "improvements"
        CatchExceptionNameMatchingTypeRector::class,
        SplitDoubleAssignRector::class,
        FinalizePublicClassConstantRector::class,

        // Converts check for null like (`$some === null`)
        // into inverse instance of (`!$some instanceof X`).
        FlipTypeControlToUseExclusiveTypeRector::class,

        //
        // Converts beautiful formatted strings in
        // one big trash.
        //
        JoinStringConcatRector::class,

        //
        // Adds "final" keyword to all classes
        //
        FinalizeClassesWithoutChildrenRector::class,

        // Это вообще какая-то херня. Берёт PSR-16 CacheInterface и заменяет
        // его на Symfony CacheInterface. В результате весь код ломается.
        RenameClassRector::class,

        // Не умеет в касты к анонимке/каррирование
        PrivatizeLocalGetterToPropertyRector::class,

        \Rector\Php74\Rector\Closure\ClosureToArrowFunctionRector::class,
    ]);
};
