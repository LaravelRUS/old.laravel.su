<?php

use App\Entity\Article\Listener\OnContentRender;
use Doctrine\DBAL\Types\JsonType;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Events;
use DoctrineExtensions\Query\Mysql\Acos;
use DoctrineExtensions\Query\Mysql\Asin;
use DoctrineExtensions\Query\Mysql\Atan;
use DoctrineExtensions\Query\Mysql\Atan2;
use DoctrineExtensions\Query\Mysql\BitCount;
use DoctrineExtensions\Query\Mysql\BitXor;
use DoctrineExtensions\Query\Mysql\Ceil;
use DoctrineExtensions\Query\Mysql\Cos;
use DoctrineExtensions\Query\Mysql\Cot;
use DoctrineExtensions\Query\Mysql\Degrees;
use DoctrineExtensions\Query\Mysql\Exp;
use DoctrineExtensions\Query\Mysql\Floor;
use DoctrineExtensions\Query\Mysql\Log10;
use DoctrineExtensions\Query\Mysql\Log2;
use DoctrineExtensions\Query\Mysql\Pi;
use DoctrineExtensions\Query\Mysql\Power;
use DoctrineExtensions\Query\Mysql\Quarter;
use DoctrineExtensions\Query\Mysql\Radians;
use DoctrineExtensions\Query\Mysql\Rand;
use DoctrineExtensions\Query\Mysql\Round;
use DoctrineExtensions\Query\Mysql\Sin;
use DoctrineExtensions\Query\Mysql\Std;
use DoctrineExtensions\Query\Mysql\StdDev;
use DoctrineExtensions\Query\Mysql\Tan;
use DoctrineExtensions\Query\Mysql\Variance;
use DoctrineExtensions\Types\CarbonDateTimeType;

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
            'meta'       => env('DOCTRINE_METADATA', 'annotations'),
            'connection' => env('DB_CONNECTION', 'mysql'),
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
                        \App\Entity\Documentation\Listener\OnContentRender::class,
                        OnContentRender::class,
                    ],
                    Events::prePersist => [
                        \App\Entity\Documentation\Listener\OnContentRender::class,
                        OnContentRender::class,
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
                //'enum' => 'string'
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

    'custom_numeric_functions' => [
        'acos'      => Acos::class,
        'asin'      => Asin::class,
        'atan2'     => Atan2::class,
        'atan'      => Atan::class,
        'bit_count' => BitCount::class,
        'bit_xor'   => BitXor::class,
        'ceil'      => Ceil::class,
        'cos'       => Cos::class,
        'cot'       => Cot::class,
        'degrees'   => Degrees::class,
        'exp'       => Exp::class,
        'floor'     => Floor::class,
        'log'       => \DoctrineExtensions\Query\Mysql\Log::class,
        'log10'     => Log10::class,
        'log2'      => Log2::class,
        'pi'        => Pi::class,
        'power'     => Power::class,
        'quarter'   => Quarter::class,
        'radians'   => Radians::class,
        'rand'      => Rand::class,
        'round'     => Round::class,
        'stddev'    => StdDev::class,
        'sin'       => Sin::class,
        'std'       => Std::class,
        'tan'       => Tan::class,
        'variance'  => Variance::class,
    ],

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
    'custom_hydration_modes'  => [
        // e.g. 'hydrationModeName' => MyHydrator::class,
    ],

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
        'second_level' => false,
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
