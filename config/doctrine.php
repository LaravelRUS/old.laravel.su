<?php

use Doctrine\DBAL\Types\JsonType;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Events;
use DoctrineExtensions\Types\CarbonDateTimeType;
use DoctrineExtensions\Types\CarbonDateTimeTzType;
use DoctrineExtensions\Types\CarbonDateType;
use DoctrineExtensions\Types\CarbonImmutableDateTimeType;
use DoctrineExtensions\Types\CarbonImmutableDateTimeTzType;
use DoctrineExtensions\Types\CarbonImmutableDateType;
use DoctrineExtensions\Types\CarbonImmutableTimeType;
use DoctrineExtensions\Types\CarbonTimeType;
use App\Domain;
use App\Infrastructure\Persistence;

return [

    /*
    |--------------------------------------------------------------------------
    | Entity Managers
    |--------------------------------------------------------------------------
    |
    | Configure your Entity Managers here. You can set a different connection
    | and driver per manager and configure events and filters. Change the
    | paths setting to the appropriate path and replace App namespace
    | by your own namespace.
    |
    | Available meta drivers: fluent|annotations|yaml|simplified_yaml|xml|simplified_xml|config|static_php|php
    |
    | Available connections: mysql|oracle|pgsql|sqlite|sqlsrv
    | (Connections can be configured in the database config)
    |
    | --> Warning: Proxy auto generation should only be enabled in dev!
    |
    */

    'managers' => [
        'default' => [
            'dev'        => env('APP_DEBUG', false),
            'meta'       => env('DOCTRINE_METADATA', 'attributes'),
            'connection' => env('DB_CONNECTION', 'default'),
            'namespaces' => [],
            'paths'      => [
                \app_path('Entity'),
            ],
            'repository' => EntityRepository::class,
            'proxies'    => [
                'namespace'     => false,
                'path'          => storage_path('proxies'),
                'auto_generate' => ! env('APP_DEBUG', false),
            ],

            /*
            |--------------------------------------------------------------------------
            | Doctrine events
            |--------------------------------------------------------------------------
            |
            | The listener array expects the key to be a Doctrine event
            | e.g. Doctrine\ORM\Events::onFlush
            |
            */

            'events' => [
                'listeners'   => [
                    Events::preUpdate  => [
                        Persistence\Doctrine\Listener\DocumentationContentRenderer::class,
                        Persistence\Doctrine\Listener\ArticleContentRenderer::class,
                        Persistence\Doctrine\Listener\UpdatedDateSynchronizer::class,
                    ],
                    Events::prePersist => [
                        Persistence\Doctrine\Listener\DocumentationContentRenderer::class,
                        Persistence\Doctrine\Listener\ArticleContentRenderer::class,
                        Persistence\Doctrine\Listener\CreatedDateSynchronizer::class,
                        Persistence\Doctrine\Listener\UpdatedDateSynchronizer::class,
                    ],
                ],
                'subscribers' => [
                ],
            ],

            'filters' => [

            ],

            /*
            |--------------------------------------------------------------------------
            | Doctrine mapping types
            |--------------------------------------------------------------------------
            |
            | Link a Database Type to a Local Doctrine Type
            |
            | Using 'enum' => 'string' is the same of:
            | $doctrineManager->extendAll(function (\Doctrine\ORM\Configuration $configuration,
            |         \Doctrine\DBAL\Connection $connection,
            |         \Doctrine\Common\EventManager $eventManager) {
            |     $connection->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');
            | });
            |
            | References:
            | http://doctrine-orm.readthedocs.org/en/latest/cookbook/custom-mapping-types.html
            | http://doctrine-dbal.readthedocs.org/en/latest/reference/types.html#custom-mapping-types
            | http://doctrine-orm.readthedocs.org/en/latest/cookbook/advanced-field-value-conversion-using-custom-mapping-types.html
            | http://doctrine-orm.readthedocs.org/en/latest/reference/basic-mapping.html#reference-mapping-types
            | http://symfony.com/doc/current/cookbook/doctrine/dbal.html#registering-custom-mapping-types-in-the-schematool
            |--------------------------------------------------------------------------
            */

            'mapping_types' => [
                'uuid' => 'string',
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Doctrine Extensions
    |--------------------------------------------------------------------------
    |
    | Enable/disable Doctrine Extensions by adding or removing them from the list
    |
    | If you want to require custom extensions you will have to require
    | laravel-doctrine/extensions in your composer.json
    |
    */

    'extensions' => [
        //LaravelDoctrine\ORM\Extensions\TablePrefix\TablePrefixExtension::class,
        //LaravelDoctrine\Extensions\Timestamps\TimestampableExtension::class,
        //LaravelDoctrine\Extensions\SoftDeletes\SoftDeleteableExtension::class,
        //LaravelDoctrine\Extensions\Sluggable\SluggableExtension::class,
        //LaravelDoctrine\Extensions\Sortable\SortableExtension::class,
        //LaravelDoctrine\Extensions\Tree\TreeExtension::class,
        //LaravelDoctrine\Extensions\Loggable\LoggableExtension::class,
        //LaravelDoctrine\Extensions\Blameable\BlameableExtension::class,
        //LaravelDoctrine\Extensions\IpTraceable\IpTraceableExtension::class,
        //LaravelDoctrine\Extensions\Translatable\TranslatableExtension::class
    ],

    /*
    |--------------------------------------------------------------------------
    | Doctrine custom types
    |--------------------------------------------------------------------------
    |
    | Create a custom or override a Doctrine Type
    |--------------------------------------------------------------------------
    */

    'custom_types' => [
        'json'   => JsonType::class,
        'carbon' => CarbonDateTimeType::class,
        'carbondatetimetz' => CarbonDateTimeTzType::class,
        'carbondate' => CarbonDateType::class,
        'carbondatetime_immutable' => CarbonImmutableDateTimeType::class,
        'carbondatetimetz_immutable' => CarbonImmutableDateTimeTzType::class,
        'carbondate_immutable' => CarbonImmutableDateType::class,
        'carbontime_immutable' => CarbonImmutableTimeType::class,
        'carbontime' => CarbonTimeType::class,

        Domain\Article\ArticleId::class => Persistence\Doctrine\Type\ArticleIdType::class,
        Domain\Documentation\DocumentationId::class => Persistence\Doctrine\Type\DocumentationIdType::class,
        Domain\Documentation\VersionId::class => Persistence\Doctrine\Type\VersionIdType::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | DQL custom datetime functions
    |--------------------------------------------------------------------------
    */

    'custom_datetime_functions' => [],

    /*
    |--------------------------------------------------------------------------
    | DQL custom numeric functions
    |--------------------------------------------------------------------------
    */

    'custom_numeric_functions' => [],

    /*
    |--------------------------------------------------------------------------
    | DQL custom string functions
    |--------------------------------------------------------------------------
    */

    'custom_string_functions' => [],

    /*
    |--------------------------------------------------------------------------
    | Register custom hydrators
    |--------------------------------------------------------------------------
    */
    'custom_hydration_modes'  => [],

    /*
    |--------------------------------------------------------------------------
    | Enable query logging with laravel file logging,
    | debugbar, clockwork or an own implementation.
    | Setting it to false, will disable logging
    |
    | Available:
    | - LaravelDoctrine\ORM\Loggers\LaravelDebugbarLogger
    | - LaravelDoctrine\ORM\Loggers\ClockworkLogger
    | - LaravelDoctrine\ORM\Loggers\FileLogger
    |--------------------------------------------------------------------------
    */

    'logger' => env('DOCTRINE_LOGGER', false),

    /*
    |--------------------------------------------------------------------------
    | Cache
    |--------------------------------------------------------------------------
    |
    | Configure meta-data, query and result caching here.
    | Optionally you can enable second level caching.
    |
    | Available: apc|array|file|memcached|php_file|redis|void
    |
    */

    'cache' => [
        'second_level' => true,
        'default'      => env('DOCTRINE_CACHE', 'array'),
        'namespace'    => null,
        'metadata'     => [
            'driver'    => env('DOCTRINE_METADATA_CACHE', env('DOCTRINE_CACHE', 'array')),
            'namespace' => null,
        ],
        'query'        => [
            'driver'    => env('DOCTRINE_QUERY_CACHE', env('DOCTRINE_CACHE', 'array')),
            'namespace' => null,
        ],
        'result'       => [
            'driver'    => env('DOCTRINE_RESULT_CACHE', env('DOCTRINE_CACHE', 'array')),
            'namespace' => null,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Gedmo extensions
    |--------------------------------------------------------------------------
    |
    | Settings for Gedmo extensions
    | If you want to use this you will have to require
    | laravel-doctrine/extensions in your composer.json
    |
    */

    'gedmo' => [
        'all_mappings' => false,
    ],

    /*
     |--------------------------------------------------------------------------
     | Validation
     |--------------------------------------------------------------------------
     |
     |  Enables the Doctrine Presence Verifier for Validation
     |
     */

    'doctrine_presence_verifier' => true,

    /*
     |--------------------------------------------------------------------------
     | Notifications
     |--------------------------------------------------------------------------
     |
     |  Doctrine notifications channel
     |
     */

    'notifications' => [
        'channel' => 'database',
    ],
];
