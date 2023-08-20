<?php
// @formatter:off
// phpcs:ignoreFile

/**
 * A helper file for Laravel, to provide autocomplete information to your IDE
 * Generated for Laravel 10.19.0.
 *
 * This file should not be included in your code, only analyzed by your IDE!
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 * @see https://github.com/barryvdh/laravel-ide-helper
 */

    namespace Illuminate\Support\Facades { 
            /**
     * 
     *
     * @see \Illuminate\Cookie\CookieJar
     */ 
        class Cookie {
                    /**
         * Create a new cookie instance.
         *
         * @param string $name
         * @param string $value
         * @param int $minutes
         * @param string|null $path
         * @param string|null $domain
         * @param bool|null $secure
         * @param bool $httpOnly
         * @param bool $raw
         * @param string|null $sameSite
         * @return \Symfony\Component\HttpFoundation\Cookie 
         * @static 
         */ 
        public static function make($name, $value, $minutes = 0, $path = null, $domain = null, $secure = null, $httpOnly = true, $raw = false, $sameSite = null)
        {
                        /** @var \Illuminate\Cookie\CookieJar $instance */
                        return $instance->make($name, $value, $minutes, $path, $domain, $secure, $httpOnly, $raw, $sameSite);
        }
                    /**
         * Create a cookie that lasts "forever" (400 days).
         *
         * @param string $name
         * @param string $value
         * @param string|null $path
         * @param string|null $domain
         * @param bool|null $secure
         * @param bool $httpOnly
         * @param bool $raw
         * @param string|null $sameSite
         * @return \Symfony\Component\HttpFoundation\Cookie 
         * @static 
         */ 
        public static function forever($name, $value, $path = null, $domain = null, $secure = null, $httpOnly = true, $raw = false, $sameSite = null)
        {
                        /** @var \Illuminate\Cookie\CookieJar $instance */
                        return $instance->forever($name, $value, $path, $domain, $secure, $httpOnly, $raw, $sameSite);
        }
                    /**
         * Expire the given cookie.
         *
         * @param string $name
         * @param string|null $path
         * @param string|null $domain
         * @return \Symfony\Component\HttpFoundation\Cookie 
         * @static 
         */ 
        public static function forget($name, $path = null, $domain = null)
        {
                        /** @var \Illuminate\Cookie\CookieJar $instance */
                        return $instance->forget($name, $path, $domain);
        }
                    /**
         * Determine if a cookie has been queued.
         *
         * @param string $key
         * @param string|null $path
         * @return bool 
         * @static 
         */ 
        public static function hasQueued($key, $path = null)
        {
                        /** @var \Illuminate\Cookie\CookieJar $instance */
                        return $instance->hasQueued($key, $path);
        }
                    /**
         * Get a queued cookie instance.
         *
         * @param string $key
         * @param mixed $default
         * @param string|null $path
         * @return \Symfony\Component\HttpFoundation\Cookie|null 
         * @static 
         */ 
        public static function queued($key, $default = null, $path = null)
        {
                        /** @var \Illuminate\Cookie\CookieJar $instance */
                        return $instance->queued($key, $default, $path);
        }
                    /**
         * Queue a cookie to send with the next response.
         *
         * @param mixed $parameters
         * @return void 
         * @static 
         */ 
        public static function queue(...$parameters)
        {
                        /** @var \Illuminate\Cookie\CookieJar $instance */
                        $instance->queue(...$parameters);
        }
                    /**
         * Queue a cookie to expire with the next response.
         *
         * @param string $name
         * @param string|null $path
         * @param string|null $domain
         * @return void 
         * @static 
         */ 
        public static function expire($name, $path = null, $domain = null)
        {
                        /** @var \Illuminate\Cookie\CookieJar $instance */
                        $instance->expire($name, $path, $domain);
        }
                    /**
         * Remove a cookie from the queue.
         *
         * @param string $name
         * @param string|null $path
         * @return void 
         * @static 
         */ 
        public static function unqueue($name, $path = null)
        {
                        /** @var \Illuminate\Cookie\CookieJar $instance */
                        $instance->unqueue($name, $path);
        }
                    /**
         * Set the default path and domain for the jar.
         *
         * @param string $path
         * @param string|null $domain
         * @param bool|null $secure
         * @param string|null $sameSite
         * @return \Illuminate\Cookie\CookieJar 
         * @static 
         */ 
        public static function setDefaultPathAndDomain($path, $domain, $secure = false, $sameSite = null)
        {
                        /** @var \Illuminate\Cookie\CookieJar $instance */
                        return $instance->setDefaultPathAndDomain($path, $domain, $secure, $sameSite);
        }
                    /**
         * Get the cookies which have been queued for the next request.
         *
         * @return \Symfony\Component\HttpFoundation\Cookie[] 
         * @static 
         */ 
        public static function getQueuedCookies()
        {
                        /** @var \Illuminate\Cookie\CookieJar $instance */
                        return $instance->getQueuedCookies();
        }
                    /**
         * Flush the cookies which have been queued for the next request.
         *
         * @return \Illuminate\Cookie\CookieJar 
         * @static 
         */ 
        public static function flushQueuedCookies()
        {
                        /** @var \Illuminate\Cookie\CookieJar $instance */
                        return $instance->flushQueuedCookies();
        }
                    /**
         * Register a custom macro.
         *
         * @param string $name
         * @param object|callable $macro
         * @return void 
         * @static 
         */ 
        public static function macro($name, $macro)
        {
                        \Illuminate\Cookie\CookieJar::macro($name, $macro);
        }
                    /**
         * Mix another object into the class.
         *
         * @param object $mixin
         * @param bool $replace
         * @return void 
         * @throws \ReflectionException
         * @static 
         */ 
        public static function mixin($mixin, $replace = true)
        {
                        \Illuminate\Cookie\CookieJar::mixin($mixin, $replace);
        }
                    /**
         * Checks if macro is registered.
         *
         * @param string $name
         * @return bool 
         * @static 
         */ 
        public static function hasMacro($name)
        {
                        return \Illuminate\Cookie\CookieJar::hasMacro($name);
        }
                    /**
         * Flush the existing macros.
         *
         * @return void 
         * @static 
         */ 
        public static function flushMacros()
        {
                        \Illuminate\Cookie\CookieJar::flushMacros();
        }
         
    }
            /**
     * 
     *
     * @see \Illuminate\Database\DatabaseManager
     */ 
        class DB {
                    /**
         * Get a database connection instance.
         *
         * @param string|null $name
         * @return \Illuminate\Database\Connection 
         * @static 
         */ 
        public static function connection($name = null)
        {
                        /** @var \Illuminate\Database\DatabaseManager $instance */
                        return $instance->connection($name);
        }
                    /**
         * Register a custom Doctrine type.
         *
         * @param string $class
         * @param string $name
         * @param string $type
         * @return void 
         * @throws \Doctrine\DBAL\Exception
         * @throws \RuntimeException
         * @static 
         */ 
        public static function registerDoctrineType($class, $name, $type)
        {
                        /** @var \Illuminate\Database\DatabaseManager $instance */
                        $instance->registerDoctrineType($class, $name, $type);
        }
                    /**
         * Disconnect from the given database and remove from local cache.
         *
         * @param string|null $name
         * @return void 
         * @static 
         */ 
        public static function purge($name = null)
        {
                        /** @var \Illuminate\Database\DatabaseManager $instance */
                        $instance->purge($name);
        }
                    /**
         * Disconnect from the given database.
         *
         * @param string|null $name
         * @return void 
         * @static 
         */ 
        public static function disconnect($name = null)
        {
                        /** @var \Illuminate\Database\DatabaseManager $instance */
                        $instance->disconnect($name);
        }
                    /**
         * Reconnect to the given database.
         *
         * @param string|null $name
         * @return \Illuminate\Database\Connection 
         * @static 
         */ 
        public static function reconnect($name = null)
        {
                        /** @var \Illuminate\Database\DatabaseManager $instance */
                        return $instance->reconnect($name);
        }
                    /**
         * Set the default database connection for the callback execution.
         *
         * @param string $name
         * @param callable $callback
         * @return mixed 
         * @static 
         */ 
        public static function usingConnection($name, $callback)
        {
                        /** @var \Illuminate\Database\DatabaseManager $instance */
                        return $instance->usingConnection($name, $callback);
        }
                    /**
         * Get the default connection name.
         *
         * @return string 
         * @static 
         */ 
        public static function getDefaultConnection()
        {
                        /** @var \Illuminate\Database\DatabaseManager $instance */
                        return $instance->getDefaultConnection();
        }
                    /**
         * Set the default connection name.
         *
         * @param string $name
         * @return void 
         * @static 
         */ 
        public static function setDefaultConnection($name)
        {
                        /** @var \Illuminate\Database\DatabaseManager $instance */
                        $instance->setDefaultConnection($name);
        }
                    /**
         * Get all of the support drivers.
         *
         * @return string[] 
         * @static 
         */ 
        public static function supportedDrivers()
        {
                        /** @var \Illuminate\Database\DatabaseManager $instance */
                        return $instance->supportedDrivers();
        }
                    /**
         * Get all of the drivers that are actually available.
         *
         * @return string[] 
         * @static 
         */ 
        public static function availableDrivers()
        {
                        /** @var \Illuminate\Database\DatabaseManager $instance */
                        return $instance->availableDrivers();
        }
                    /**
         * Register an extension connection resolver.
         *
         * @param string $name
         * @param callable $resolver
         * @return void 
         * @static 
         */ 
        public static function extend($name, $resolver)
        {
                        /** @var \Illuminate\Database\DatabaseManager $instance */
                        $instance->extend($name, $resolver);
        }
                    /**
         * Remove an extension connection resolver.
         *
         * @param string $name
         * @return void 
         * @static 
         */ 
        public static function forgetExtension($name)
        {
                        /** @var \Illuminate\Database\DatabaseManager $instance */
                        $instance->forgetExtension($name);
        }
                    /**
         * Return all of the created connections.
         *
         * @return array<string, \Illuminate\Database\Connection> 
         * @static 
         */ 
        public static function getConnections()
        {
                        /** @var \Illuminate\Database\DatabaseManager $instance */
                        return $instance->getConnections();
        }
                    /**
         * Set the database reconnector callback.
         *
         * @param callable $reconnector
         * @return void 
         * @static 
         */ 
        public static function setReconnector($reconnector)
        {
                        /** @var \Illuminate\Database\DatabaseManager $instance */
                        $instance->setReconnector($reconnector);
        }
                    /**
         * Set the application instance used by the manager.
         *
         * @param \Illuminate\Contracts\Foundation\Application $app
         * @return \Illuminate\Database\DatabaseManager 
         * @static 
         */ 
        public static function setApplication($app)
        {
                        /** @var \Illuminate\Database\DatabaseManager $instance */
                        return $instance->setApplication($app);
        }
                    /**
         * Register a custom macro.
         *
         * @param string $name
         * @param object|callable $macro
         * @return void 
         * @static 
         */ 
        public static function macro($name, $macro)
        {
                        \Illuminate\Database\DatabaseManager::macro($name, $macro);
        }
                    /**
         * Mix another object into the class.
         *
         * @param object $mixin
         * @param bool $replace
         * @return void 
         * @throws \ReflectionException
         * @static 
         */ 
        public static function mixin($mixin, $replace = true)
        {
                        \Illuminate\Database\DatabaseManager::mixin($mixin, $replace);
        }
                    /**
         * Checks if macro is registered.
         *
         * @param string $name
         * @return bool 
         * @static 
         */ 
        public static function hasMacro($name)
        {
                        return \Illuminate\Database\DatabaseManager::hasMacro($name);
        }
                    /**
         * Flush the existing macros.
         *
         * @return void 
         * @static 
         */ 
        public static function flushMacros()
        {
                        \Illuminate\Database\DatabaseManager::flushMacros();
        }
                    /**
         * Dynamically handle calls to the class.
         *
         * @param string $method
         * @param array $parameters
         * @return mixed 
         * @throws \BadMethodCallException
         * @static 
         */ 
        public static function macroCall($method, $parameters)
        {
                        /** @var \Illuminate\Database\DatabaseManager $instance */
                        return $instance->macroCall($method, $parameters);
        }
                    /**
         * Get a schema builder instance for the connection.
         *
         * @return \Illuminate\Database\Schema\PostgresBuilder 
         * @static 
         */ 
        public static function getSchemaBuilder()
        {
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        return $instance->getSchemaBuilder();
        }
                    /**
         * Get the schema state for the connection.
         *
         * @param \Illuminate\Filesystem\Filesystem|null $files
         * @param callable|null $processFactory
         * @return \Illuminate\Database\Schema\PostgresSchemaState 
         * @static 
         */ 
        public static function getSchemaState($files = null, $processFactory = null)
        {
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        return $instance->getSchemaState($files, $processFactory);
        }
                    /**
         * Set the query grammar to the default implementation.
         *
         * @return void 
         * @static 
         */ 
        public static function useDefaultQueryGrammar()
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        $instance->useDefaultQueryGrammar();
        }
                    /**
         * Set the schema grammar to the default implementation.
         *
         * @return void 
         * @static 
         */ 
        public static function useDefaultSchemaGrammar()
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        $instance->useDefaultSchemaGrammar();
        }
                    /**
         * Set the query post processor to the default implementation.
         *
         * @return void 
         * @static 
         */ 
        public static function useDefaultPostProcessor()
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        $instance->useDefaultPostProcessor();
        }
                    /**
         * Begin a fluent query against a database table.
         *
         * @param \Closure|\Illuminate\Database\Query\Builder|\Illuminate\Contracts\Database\Query\Expression|string $table
         * @param string|null $as
         * @return \Illuminate\Database\Query\Builder 
         * @static 
         */ 
        public static function table($table, $as = null)
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        return $instance->table($table, $as);
        }
                    /**
         * Get a new query builder instance.
         *
         * @return \Illuminate\Database\Query\Builder 
         * @static 
         */ 
        public static function query()
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        return $instance->query();
        }
                    /**
         * Run a select statement and return a single result.
         *
         * @param string $query
         * @param array $bindings
         * @param bool $useReadPdo
         * @return mixed 
         * @static 
         */ 
        public static function selectOne($query, $bindings = [], $useReadPdo = true)
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        return $instance->selectOne($query, $bindings, $useReadPdo);
        }
                    /**
         * Run a select statement and return the first column of the first row.
         *
         * @param string $query
         * @param array $bindings
         * @param bool $useReadPdo
         * @return mixed 
         * @throws \Illuminate\Database\MultipleColumnsSelectedException
         * @static 
         */ 
        public static function scalar($query, $bindings = [], $useReadPdo = true)
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        return $instance->scalar($query, $bindings, $useReadPdo);
        }
                    /**
         * Run a select statement against the database.
         *
         * @param string $query
         * @param array $bindings
         * @return array 
         * @static 
         */ 
        public static function selectFromWriteConnection($query, $bindings = [])
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        return $instance->selectFromWriteConnection($query, $bindings);
        }
                    /**
         * Run a select statement against the database.
         *
         * @param string $query
         * @param array $bindings
         * @param bool $useReadPdo
         * @return array 
         * @static 
         */ 
        public static function select($query, $bindings = [], $useReadPdo = true)
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        return $instance->select($query, $bindings, $useReadPdo);
        }
                    /**
         * Run a select statement against the database and returns all of the result sets.
         *
         * @param string $query
         * @param array $bindings
         * @param bool $useReadPdo
         * @return array 
         * @static 
         */ 
        public static function selectResultSets($query, $bindings = [], $useReadPdo = true)
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        return $instance->selectResultSets($query, $bindings, $useReadPdo);
        }
                    /**
         * Run a select statement against the database and returns a generator.
         *
         * @param string $query
         * @param array $bindings
         * @param bool $useReadPdo
         * @return \Generator 
         * @static 
         */ 
        public static function cursor($query, $bindings = [], $useReadPdo = true)
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        return $instance->cursor($query, $bindings, $useReadPdo);
        }
                    /**
         * Run an insert statement against the database.
         *
         * @param string $query
         * @param array $bindings
         * @return bool 
         * @static 
         */ 
        public static function insert($query, $bindings = [])
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        return $instance->insert($query, $bindings);
        }
                    /**
         * Run an update statement against the database.
         *
         * @param string $query
         * @param array $bindings
         * @return int 
         * @static 
         */ 
        public static function update($query, $bindings = [])
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        return $instance->update($query, $bindings);
        }
                    /**
         * Run a delete statement against the database.
         *
         * @param string $query
         * @param array $bindings
         * @return int 
         * @static 
         */ 
        public static function delete($query, $bindings = [])
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        return $instance->delete($query, $bindings);
        }
                    /**
         * Execute an SQL statement and return the boolean result.
         *
         * @param string $query
         * @param array $bindings
         * @return bool 
         * @static 
         */ 
        public static function statement($query, $bindings = [])
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        return $instance->statement($query, $bindings);
        }
                    /**
         * Run an SQL statement and get the number of rows affected.
         *
         * @param string $query
         * @param array $bindings
         * @return int 
         * @static 
         */ 
        public static function affectingStatement($query, $bindings = [])
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        return $instance->affectingStatement($query, $bindings);
        }
                    /**
         * Run a raw, unprepared query against the PDO connection.
         *
         * @param string $query
         * @return bool 
         * @static 
         */ 
        public static function unprepared($query)
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        return $instance->unprepared($query);
        }
                    /**
         * Execute the given callback in "dry run" mode.
         *
         * @param \Closure $callback
         * @return array 
         * @static 
         */ 
        public static function pretend($callback)
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        return $instance->pretend($callback);
        }
                    /**
         * Bind values to their parameters in the given statement.
         *
         * @param \PDOStatement $statement
         * @param array $bindings
         * @return void 
         * @static 
         */ 
        public static function bindValues($statement, $bindings)
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        $instance->bindValues($statement, $bindings);
        }
                    /**
         * Prepare the query bindings for execution.
         *
         * @param array $bindings
         * @return array 
         * @static 
         */ 
        public static function prepareBindings($bindings)
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        return $instance->prepareBindings($bindings);
        }
                    /**
         * Log a query in the connection's query log.
         *
         * @param string $query
         * @param array $bindings
         * @param float|null $time
         * @return void 
         * @static 
         */ 
        public static function logQuery($query, $bindings, $time = null)
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        $instance->logQuery($query, $bindings, $time);
        }
                    /**
         * Register a callback to be invoked when the connection queries for longer than a given amount of time.
         *
         * @param \DateTimeInterface|\Carbon\CarbonInterval|float|int $threshold
         * @param callable $handler
         * @return void 
         * @static 
         */ 
        public static function whenQueryingForLongerThan($threshold, $handler)
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        $instance->whenQueryingForLongerThan($threshold, $handler);
        }
                    /**
         * Allow all the query duration handlers to run again, even if they have already run.
         *
         * @return void 
         * @static 
         */ 
        public static function allowQueryDurationHandlersToRunAgain()
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        $instance->allowQueryDurationHandlersToRunAgain();
        }
                    /**
         * Get the duration of all run queries in milliseconds.
         *
         * @return float 
         * @static 
         */ 
        public static function totalQueryDuration()
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        return $instance->totalQueryDuration();
        }
                    /**
         * Reset the duration of all run queries.
         *
         * @return void 
         * @static 
         */ 
        public static function resetTotalQueryDuration()
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        $instance->resetTotalQueryDuration();
        }
                    /**
         * Reconnect to the database if a PDO connection is missing.
         *
         * @return void 
         * @static 
         */ 
        public static function reconnectIfMissingConnection()
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        $instance->reconnectIfMissingConnection();
        }
                    /**
         * Register a hook to be run just before a database query is executed.
         *
         * @param \Closure $callback
         * @return \Illuminate\Database\PostgresConnection 
         * @static 
         */ 
        public static function beforeExecuting($callback)
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        return $instance->beforeExecuting($callback);
        }
                    /**
         * Register a database query listener with the connection.
         *
         * @param \Closure $callback
         * @return void 
         * @static 
         */ 
        public static function listen($callback)
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        $instance->listen($callback);
        }
                    /**
         * Get a new raw query expression.
         *
         * @param mixed $value
         * @return \Illuminate\Contracts\Database\Query\Expression 
         * @static 
         */ 
        public static function raw($value)
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        return $instance->raw($value);
        }
                    /**
         * Escape a value for safe SQL embedding.
         *
         * @param string|float|int|bool|null $value
         * @param bool $binary
         * @return string 
         * @static 
         */ 
        public static function escape($value, $binary = false)
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        return $instance->escape($value, $binary);
        }
                    /**
         * Determine if the database connection has modified any database records.
         *
         * @return bool 
         * @static 
         */ 
        public static function hasModifiedRecords()
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        return $instance->hasModifiedRecords();
        }
                    /**
         * Indicate if any records have been modified.
         *
         * @param bool $value
         * @return void 
         * @static 
         */ 
        public static function recordsHaveBeenModified($value = true)
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        $instance->recordsHaveBeenModified($value);
        }
                    /**
         * Set the record modification state.
         *
         * @param bool $value
         * @return \Illuminate\Database\PostgresConnection 
         * @static 
         */ 
        public static function setRecordModificationState($value)
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        return $instance->setRecordModificationState($value);
        }
                    /**
         * Reset the record modification state.
         *
         * @return void 
         * @static 
         */ 
        public static function forgetRecordModificationState()
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        $instance->forgetRecordModificationState();
        }
                    /**
         * Indicate that the connection should use the write PDO connection for reads.
         *
         * @param bool $value
         * @return \Illuminate\Database\PostgresConnection 
         * @static 
         */ 
        public static function useWriteConnectionWhenReading($value = true)
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        return $instance->useWriteConnectionWhenReading($value);
        }
                    /**
         * Is Doctrine available?
         *
         * @return bool 
         * @static 
         */ 
        public static function isDoctrineAvailable()
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        return $instance->isDoctrineAvailable();
        }
                    /**
         * Indicates whether native alter operations will be used when dropping, renaming, or modifying columns, even if Doctrine DBAL is installed.
         *
         * @return bool 
         * @static 
         */ 
        public static function usingNativeSchemaOperations()
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        return $instance->usingNativeSchemaOperations();
        }
                    /**
         * Get a Doctrine Schema Column instance.
         *
         * @param string $table
         * @param string $column
         * @return \Doctrine\DBAL\Schema\Column 
         * @static 
         */ 
        public static function getDoctrineColumn($table, $column)
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        return $instance->getDoctrineColumn($table, $column);
        }
                    /**
         * Get the Doctrine DBAL schema manager for the connection.
         *
         * @return \Doctrine\DBAL\Schema\AbstractSchemaManager 
         * @static 
         */ 
        public static function getDoctrineSchemaManager()
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        return $instance->getDoctrineSchemaManager();
        }
                    /**
         * Get the Doctrine DBAL database connection instance.
         *
         * @return \Doctrine\DBAL\Connection 
         * @static 
         */ 
        public static function getDoctrineConnection()
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        return $instance->getDoctrineConnection();
        }
                    /**
         * Get the current PDO connection.
         *
         * @return \PDO 
         * @static 
         */ 
        public static function getPdo()
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        return $instance->getPdo();
        }
                    /**
         * Get the current PDO connection parameter without executing any reconnect logic.
         *
         * @return \PDO|\Closure|null 
         * @static 
         */ 
        public static function getRawPdo()
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        return $instance->getRawPdo();
        }
                    /**
         * Get the current PDO connection used for reading.
         *
         * @return \PDO 
         * @static 
         */ 
        public static function getReadPdo()
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        return $instance->getReadPdo();
        }
                    /**
         * Get the current read PDO connection parameter without executing any reconnect logic.
         *
         * @return \PDO|\Closure|null 
         * @static 
         */ 
        public static function getRawReadPdo()
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        return $instance->getRawReadPdo();
        }
                    /**
         * Set the PDO connection.
         *
         * @param \PDO|\Closure|null $pdo
         * @return \Illuminate\Database\PostgresConnection 
         * @static 
         */ 
        public static function setPdo($pdo)
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        return $instance->setPdo($pdo);
        }
                    /**
         * Set the PDO connection used for reading.
         *
         * @param \PDO|\Closure|null $pdo
         * @return \Illuminate\Database\PostgresConnection 
         * @static 
         */ 
        public static function setReadPdo($pdo)
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        return $instance->setReadPdo($pdo);
        }
                    /**
         * Get the database connection name.
         *
         * @return string|null 
         * @static 
         */ 
        public static function getName()
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        return $instance->getName();
        }
                    /**
         * Get the database connection full name.
         *
         * @return string|null 
         * @static 
         */ 
        public static function getNameWithReadWriteType()
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        return $instance->getNameWithReadWriteType();
        }
                    /**
         * Get an option from the configuration options.
         *
         * @param string|null $option
         * @return mixed 
         * @static 
         */ 
        public static function getConfig($option = null)
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        return $instance->getConfig($option);
        }
                    /**
         * Get the PDO driver name.
         *
         * @return string 
         * @static 
         */ 
        public static function getDriverName()
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        return $instance->getDriverName();
        }
                    /**
         * Get the query grammar used by the connection.
         *
         * @return \Illuminate\Database\Query\Grammars\Grammar 
         * @static 
         */ 
        public static function getQueryGrammar()
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        return $instance->getQueryGrammar();
        }
                    /**
         * Set the query grammar used by the connection.
         *
         * @param \Illuminate\Database\Query\Grammars\Grammar $grammar
         * @return \Illuminate\Database\PostgresConnection 
         * @static 
         */ 
        public static function setQueryGrammar($grammar)
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        return $instance->setQueryGrammar($grammar);
        }
                    /**
         * Get the schema grammar used by the connection.
         *
         * @return \Illuminate\Database\Schema\Grammars\Grammar 
         * @static 
         */ 
        public static function getSchemaGrammar()
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        return $instance->getSchemaGrammar();
        }
                    /**
         * Set the schema grammar used by the connection.
         *
         * @param \Illuminate\Database\Schema\Grammars\Grammar $grammar
         * @return \Illuminate\Database\PostgresConnection 
         * @static 
         */ 
        public static function setSchemaGrammar($grammar)
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        return $instance->setSchemaGrammar($grammar);
        }
                    /**
         * Get the query post processor used by the connection.
         *
         * @return \Illuminate\Database\Query\Processors\Processor 
         * @static 
         */ 
        public static function getPostProcessor()
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        return $instance->getPostProcessor();
        }
                    /**
         * Set the query post processor used by the connection.
         *
         * @param \Illuminate\Database\Query\Processors\Processor $processor
         * @return \Illuminate\Database\PostgresConnection 
         * @static 
         */ 
        public static function setPostProcessor($processor)
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        return $instance->setPostProcessor($processor);
        }
                    /**
         * Get the event dispatcher used by the connection.
         *
         * @return \Illuminate\Contracts\Events\Dispatcher 
         * @static 
         */ 
        public static function getEventDispatcher()
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        return $instance->getEventDispatcher();
        }
                    /**
         * Set the event dispatcher instance on the connection.
         *
         * @param \Illuminate\Contracts\Events\Dispatcher $events
         * @return \Illuminate\Database\PostgresConnection 
         * @static 
         */ 
        public static function setEventDispatcher($events)
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        return $instance->setEventDispatcher($events);
        }
                    /**
         * Unset the event dispatcher for this connection.
         *
         * @return void 
         * @static 
         */ 
        public static function unsetEventDispatcher()
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        $instance->unsetEventDispatcher();
        }
                    /**
         * Set the transaction manager instance on the connection.
         *
         * @param \Illuminate\Database\DatabaseTransactionsManager $manager
         * @return \Illuminate\Database\PostgresConnection 
         * @static 
         */ 
        public static function setTransactionManager($manager)
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        return $instance->setTransactionManager($manager);
        }
                    /**
         * Unset the transaction manager for this connection.
         *
         * @return void 
         * @static 
         */ 
        public static function unsetTransactionManager()
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        $instance->unsetTransactionManager();
        }
                    /**
         * Determine if the connection is in a "dry run".
         *
         * @return bool 
         * @static 
         */ 
        public static function pretending()
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        return $instance->pretending();
        }
                    /**
         * Get the connection query log.
         *
         * @return array 
         * @static 
         */ 
        public static function getQueryLog()
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        return $instance->getQueryLog();
        }
                    /**
         * Get the connection query log with embedded bindings.
         *
         * @return array 
         * @static 
         */ 
        public static function getRawQueryLog()
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        return $instance->getRawQueryLog();
        }
                    /**
         * Clear the query log.
         *
         * @return void 
         * @static 
         */ 
        public static function flushQueryLog()
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        $instance->flushQueryLog();
        }
                    /**
         * Enable the query log on the connection.
         *
         * @return void 
         * @static 
         */ 
        public static function enableQueryLog()
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        $instance->enableQueryLog();
        }
                    /**
         * Disable the query log on the connection.
         *
         * @return void 
         * @static 
         */ 
        public static function disableQueryLog()
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        $instance->disableQueryLog();
        }
                    /**
         * Determine whether we're logging queries.
         *
         * @return bool 
         * @static 
         */ 
        public static function logging()
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        return $instance->logging();
        }
                    /**
         * Get the name of the connected database.
         *
         * @return string 
         * @static 
         */ 
        public static function getDatabaseName()
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        return $instance->getDatabaseName();
        }
                    /**
         * Set the name of the connected database.
         *
         * @param string $database
         * @return \Illuminate\Database\PostgresConnection 
         * @static 
         */ 
        public static function setDatabaseName($database)
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        return $instance->setDatabaseName($database);
        }
                    /**
         * Set the read / write type of the connection.
         *
         * @param string|null $readWriteType
         * @return \Illuminate\Database\PostgresConnection 
         * @static 
         */ 
        public static function setReadWriteType($readWriteType)
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        return $instance->setReadWriteType($readWriteType);
        }
                    /**
         * Get the table prefix for the connection.
         *
         * @return string 
         * @static 
         */ 
        public static function getTablePrefix()
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        return $instance->getTablePrefix();
        }
                    /**
         * Set the table prefix in use by the connection.
         *
         * @param string $prefix
         * @return \Illuminate\Database\PostgresConnection 
         * @static 
         */ 
        public static function setTablePrefix($prefix)
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        return $instance->setTablePrefix($prefix);
        }
                    /**
         * Set the table prefix and return the grammar.
         *
         * @param \Illuminate\Database\Grammar $grammar
         * @return \Illuminate\Database\Grammar 
         * @static 
         */ 
        public static function withTablePrefix($grammar)
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        return $instance->withTablePrefix($grammar);
        }
                    /**
         * Register a connection resolver.
         *
         * @param string $driver
         * @param \Closure $callback
         * @return void 
         * @static 
         */ 
        public static function resolverFor($driver, $callback)
        {            //Method inherited from \Illuminate\Database\Connection         
                        \Illuminate\Database\PostgresConnection::resolverFor($driver, $callback);
        }
                    /**
         * Get the connection resolver for the given driver.
         *
         * @param string $driver
         * @return mixed 
         * @static 
         */ 
        public static function getResolver($driver)
        {            //Method inherited from \Illuminate\Database\Connection         
                        return \Illuminate\Database\PostgresConnection::getResolver($driver);
        }
                    /**
         * Execute a Closure within a transaction.
         *
         * @param \Closure $callback
         * @param int $attempts
         * @return mixed 
         * @throws \Throwable
         * @static 
         */ 
        public static function transaction($callback, $attempts = 1)
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        return $instance->transaction($callback, $attempts);
        }
                    /**
         * Start a new database transaction.
         *
         * @return void 
         * @throws \Throwable
         * @static 
         */ 
        public static function beginTransaction()
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        $instance->beginTransaction();
        }
                    /**
         * Commit the active database transaction.
         *
         * @return void 
         * @throws \Throwable
         * @static 
         */ 
        public static function commit()
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        $instance->commit();
        }
                    /**
         * Rollback the active database transaction.
         *
         * @param int|null $toLevel
         * @return void 
         * @throws \Throwable
         * @static 
         */ 
        public static function rollBack($toLevel = null)
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        $instance->rollBack($toLevel);
        }
                    /**
         * Get the number of active transactions.
         *
         * @return int 
         * @static 
         */ 
        public static function transactionLevel()
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        return $instance->transactionLevel();
        }
                    /**
         * Execute the callback after a transaction commits.
         *
         * @param callable $callback
         * @return void 
         * @throws \RuntimeException
         * @static 
         */ 
        public static function afterCommit($callback)
        {            //Method inherited from \Illuminate\Database\Connection         
                        /** @var \Illuminate\Database\PostgresConnection $instance */
                        $instance->afterCommit($callback);
        }
         
    }
            /**
     * 
     *
     * @method static void write(string $level, \Illuminate\Contracts\Support\Arrayable|\Illuminate\Contracts\Support\Jsonable|\Illuminate\Support\Stringable|array|string $message, array $context = [])
     * @method static \Illuminate\Log\Logger withContext(array $context = [])
     * @method static \Illuminate\Log\Logger withoutContext()
     * @method static void listen(\Closure $callback)
     * @method static \Psr\Log\LoggerInterface getLogger()
     * @method static \Illuminate\Contracts\Events\Dispatcher getEventDispatcher()
     * @method static void setEventDispatcher(\Illuminate\Contracts\Events\Dispatcher $dispatcher)
     * @method static \Illuminate\Log\Logger|mixed when(\Closure|mixed|null $value = null, callable|null $callback = null, callable|null $default = null)
     * @method static \Illuminate\Log\Logger|mixed unless(\Closure|mixed|null $value = null, callable|null $callback = null, callable|null $default = null)
     * @see \Illuminate\Log\LogManager
     */ 
        class Log {
                    /**
         * Build an on-demand log channel.
         *
         * @param array $config
         * @return \Psr\Log\LoggerInterface 
         * @static 
         */ 
        public static function build($config)
        {
                        /** @var \Illuminate\Log\LogManager $instance */
                        return $instance->build($config);
        }
                    /**
         * Create a new, on-demand aggregate logger instance.
         *
         * @param array $channels
         * @param string|null $channel
         * @return \Psr\Log\LoggerInterface 
         * @static 
         */ 
        public static function stack($channels, $channel = null)
        {
                        /** @var \Illuminate\Log\LogManager $instance */
                        return $instance->stack($channels, $channel);
        }
                    /**
         * Get a log channel instance.
         *
         * @param string|null $channel
         * @return \Psr\Log\LoggerInterface 
         * @static 
         */ 
        public static function channel($channel = null)
        {
                        /** @var \Illuminate\Log\LogManager $instance */
                        return $instance->channel($channel);
        }
                    /**
         * Get a log driver instance.
         *
         * @param string|null $driver
         * @return \Psr\Log\LoggerInterface 
         * @static 
         */ 
        public static function driver($driver = null)
        {
                        /** @var \Illuminate\Log\LogManager $instance */
                        return $instance->driver($driver);
        }
                    /**
         * Share context across channels and stacks.
         *
         * @param array $context
         * @return \Illuminate\Log\LogManager 
         * @static 
         */ 
        public static function shareContext($context)
        {
                        /** @var \Illuminate\Log\LogManager $instance */
                        return $instance->shareContext($context);
        }
                    /**
         * The context shared across channels and stacks.
         *
         * @return array 
         * @static 
         */ 
        public static function sharedContext()
        {
                        /** @var \Illuminate\Log\LogManager $instance */
                        return $instance->sharedContext();
        }
                    /**
         * Flush the shared context.
         *
         * @return \Illuminate\Log\LogManager 
         * @static 
         */ 
        public static function flushSharedContext()
        {
                        /** @var \Illuminate\Log\LogManager $instance */
                        return $instance->flushSharedContext();
        }
                    /**
         * Get the default log driver name.
         *
         * @return string|null 
         * @static 
         */ 
        public static function getDefaultDriver()
        {
                        /** @var \Illuminate\Log\LogManager $instance */
                        return $instance->getDefaultDriver();
        }
                    /**
         * Set the default log driver name.
         *
         * @param string $name
         * @return void 
         * @static 
         */ 
        public static function setDefaultDriver($name)
        {
                        /** @var \Illuminate\Log\LogManager $instance */
                        $instance->setDefaultDriver($name);
        }
                    /**
         * Register a custom driver creator Closure.
         *
         * @param string $driver
         * @param \Closure $callback
         * @return \Illuminate\Log\LogManager 
         * @static 
         */ 
        public static function extend($driver, $callback)
        {
                        /** @var \Illuminate\Log\LogManager $instance */
                        return $instance->extend($driver, $callback);
        }
                    /**
         * Unset the given channel instance.
         *
         * @param string|null $driver
         * @return void 
         * @static 
         */ 
        public static function forgetChannel($driver = null)
        {
                        /** @var \Illuminate\Log\LogManager $instance */
                        $instance->forgetChannel($driver);
        }
                    /**
         * Get all of the resolved log channels.
         *
         * @return array 
         * @static 
         */ 
        public static function getChannels()
        {
                        /** @var \Illuminate\Log\LogManager $instance */
                        return $instance->getChannels();
        }
                    /**
         * System is unusable.
         *
         * @param string $message
         * @param array $context
         * @return void 
         * @static 
         */ 
        public static function emergency($message, $context = [])
        {
                        /** @var \Illuminate\Log\LogManager $instance */
                        $instance->emergency($message, $context);
        }
                    /**
         * Action must be taken immediately.
         * 
         * Example: Entire website down, database unavailable, etc. This should
         * trigger the SMS alerts and wake you up.
         *
         * @param string $message
         * @param array $context
         * @return void 
         * @static 
         */ 
        public static function alert($message, $context = [])
        {
                        /** @var \Illuminate\Log\LogManager $instance */
                        $instance->alert($message, $context);
        }
                    /**
         * Critical conditions.
         * 
         * Example: Application component unavailable, unexpected exception.
         *
         * @param string $message
         * @param array $context
         * @return void 
         * @static 
         */ 
        public static function critical($message, $context = [])
        {
                        /** @var \Illuminate\Log\LogManager $instance */
                        $instance->critical($message, $context);
        }
                    /**
         * Runtime errors that do not require immediate action but should typically
         * be logged and monitored.
         *
         * @param string $message
         * @param array $context
         * @return void 
         * @static 
         */ 
        public static function error($message, $context = [])
        {
                        /** @var \Illuminate\Log\LogManager $instance */
                        $instance->error($message, $context);
        }
                    /**
         * Exceptional occurrences that are not errors.
         * 
         * Example: Use of deprecated APIs, poor use of an API, undesirable things
         * that are not necessarily wrong.
         *
         * @param string $message
         * @param array $context
         * @return void 
         * @static 
         */ 
        public static function warning($message, $context = [])
        {
                        /** @var \Illuminate\Log\LogManager $instance */
                        $instance->warning($message, $context);
        }
                    /**
         * Normal but significant events.
         *
         * @param string $message
         * @param array $context
         * @return void 
         * @static 
         */ 
        public static function notice($message, $context = [])
        {
                        /** @var \Illuminate\Log\LogManager $instance */
                        $instance->notice($message, $context);
        }
                    /**
         * Interesting events.
         * 
         * Example: User logs in, SQL logs.
         *
         * @param string $message
         * @param array $context
         * @return void 
         * @static 
         */ 
        public static function info($message, $context = [])
        {
                        /** @var \Illuminate\Log\LogManager $instance */
                        $instance->info($message, $context);
        }
                    /**
         * Detailed debug information.
         *
         * @param string $message
         * @param array $context
         * @return void 
         * @static 
         */ 
        public static function debug($message, $context = [])
        {
                        /** @var \Illuminate\Log\LogManager $instance */
                        $instance->debug($message, $context);
        }
                    /**
         * Logs with an arbitrary level.
         *
         * @param mixed $level
         * @param string $message
         * @param array $context
         * @return void 
         * @static 
         */ 
        public static function log($level, $message, $context = [])
        {
                        /** @var \Illuminate\Log\LogManager $instance */
                        $instance->log($level, $message, $context);
        }
         
    }
            /**
     * 
     *
     * @method static \Illuminate\Routing\RouteRegistrar attribute(string $key, mixed $value)
     * @method static \Illuminate\Routing\RouteRegistrar whereAlpha(array|string $parameters)
     * @method static \Illuminate\Routing\RouteRegistrar whereAlphaNumeric(array|string $parameters)
     * @method static \Illuminate\Routing\RouteRegistrar whereNumber(array|string $parameters)
     * @method static \Illuminate\Routing\RouteRegistrar whereUlid(array|string $parameters)
     * @method static \Illuminate\Routing\RouteRegistrar whereUuid(array|string $parameters)
     * @method static \Illuminate\Routing\RouteRegistrar whereIn(array|string $parameters, array $values)
     * @method static \Illuminate\Routing\RouteRegistrar as(string $value)
     * @method static \Illuminate\Routing\RouteRegistrar controller(string $controller)
     * @method static \Illuminate\Routing\RouteRegistrar domain(string $value)
     * @method static \Illuminate\Routing\RouteRegistrar middleware(array|string|null $middleware)
     * @method static \Illuminate\Routing\RouteRegistrar name(string $value)
     * @method static \Illuminate\Routing\RouteRegistrar namespace(string|null $value)
     * @method static \Illuminate\Routing\RouteRegistrar prefix(string $prefix)
     * @method static \Illuminate\Routing\RouteRegistrar scopeBindings()
     * @method static \Illuminate\Routing\RouteRegistrar where(array $where)
     * @method static \Illuminate\Routing\RouteRegistrar withoutMiddleware(array|string $middleware)
     * @method static \Illuminate\Routing\RouteRegistrar withoutScopedBindings()
     * @see \Illuminate\Routing\Router
     */ 
        class Route {
                    /**
         * Register a new GET route with the router.
         *
         * @param string $uri
         * @param array|string|callable|null $action
         * @return \Illuminate\Routing\Route 
         * @static 
         */ 
        public static function get($uri, $action = null)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->get($uri, $action);
        }
                    /**
         * Register a new POST route with the router.
         *
         * @param string $uri
         * @param array|string|callable|null $action
         * @return \Illuminate\Routing\Route 
         * @static 
         */ 
        public static function post($uri, $action = null)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->post($uri, $action);
        }
                    /**
         * Register a new PUT route with the router.
         *
         * @param string $uri
         * @param array|string|callable|null $action
         * @return \Illuminate\Routing\Route 
         * @static 
         */ 
        public static function put($uri, $action = null)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->put($uri, $action);
        }
                    /**
         * Register a new PATCH route with the router.
         *
         * @param string $uri
         * @param array|string|callable|null $action
         * @return \Illuminate\Routing\Route 
         * @static 
         */ 
        public static function patch($uri, $action = null)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->patch($uri, $action);
        }
                    /**
         * Register a new DELETE route with the router.
         *
         * @param string $uri
         * @param array|string|callable|null $action
         * @return \Illuminate\Routing\Route 
         * @static 
         */ 
        public static function delete($uri, $action = null)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->delete($uri, $action);
        }
                    /**
         * Register a new OPTIONS route with the router.
         *
         * @param string $uri
         * @param array|string|callable|null $action
         * @return \Illuminate\Routing\Route 
         * @static 
         */ 
        public static function options($uri, $action = null)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->options($uri, $action);
        }
                    /**
         * Register a new route responding to all verbs.
         *
         * @param string $uri
         * @param array|string|callable|null $action
         * @return \Illuminate\Routing\Route 
         * @static 
         */ 
        public static function any($uri, $action = null)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->any($uri, $action);
        }
                    /**
         * Register a new fallback route with the router.
         *
         * @param array|string|callable|null $action
         * @return \Illuminate\Routing\Route 
         * @static 
         */ 
        public static function fallback($action)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->fallback($action);
        }
                    /**
         * Create a redirect from one URI to another.
         *
         * @param string $uri
         * @param string $destination
         * @param int $status
         * @return \Illuminate\Routing\Route 
         * @static 
         */ 
        public static function redirect($uri, $destination, $status = 302)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->redirect($uri, $destination, $status);
        }
                    /**
         * Create a permanent redirect from one URI to another.
         *
         * @param string $uri
         * @param string $destination
         * @return \Illuminate\Routing\Route 
         * @static 
         */ 
        public static function permanentRedirect($uri, $destination)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->permanentRedirect($uri, $destination);
        }
                    /**
         * Register a new route that returns a view.
         *
         * @param string $uri
         * @param string $view
         * @param array $data
         * @param int|array $status
         * @param array $headers
         * @return \Illuminate\Routing\Route 
         * @static 
         */ 
        public static function view($uri, $view, $data = [], $status = 200, $headers = [])
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->view($uri, $view, $data, $status, $headers);
        }
                    /**
         * Register a new route with the given verbs.
         *
         * @param array|string $methods
         * @param string $uri
         * @param array|string|callable|null $action
         * @return \Illuminate\Routing\Route 
         * @static 
         */ 
        public static function match($methods, $uri, $action = null)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->match($methods, $uri, $action);
        }
                    /**
         * Register an array of resource controllers.
         *
         * @param array $resources
         * @param array $options
         * @return void 
         * @static 
         */ 
        public static function resources($resources, $options = [])
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        $instance->resources($resources, $options);
        }
                    /**
         * Route a resource to a controller.
         *
         * @param string $name
         * @param string $controller
         * @param array $options
         * @return \Illuminate\Routing\PendingResourceRegistration 
         * @static 
         */ 
        public static function resource($name, $controller, $options = [])
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->resource($name, $controller, $options);
        }
                    /**
         * Register an array of API resource controllers.
         *
         * @param array $resources
         * @param array $options
         * @return void 
         * @static 
         */ 
        public static function apiResources($resources, $options = [])
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        $instance->apiResources($resources, $options);
        }
                    /**
         * Route an API resource to a controller.
         *
         * @param string $name
         * @param string $controller
         * @param array $options
         * @return \Illuminate\Routing\PendingResourceRegistration 
         * @static 
         */ 
        public static function apiResource($name, $controller, $options = [])
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->apiResource($name, $controller, $options);
        }
                    /**
         * Register an array of singleton resource controllers.
         *
         * @param array $singletons
         * @param array $options
         * @return void 
         * @static 
         */ 
        public static function singletons($singletons, $options = [])
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        $instance->singletons($singletons, $options);
        }
                    /**
         * Route a singleton resource to a controller.
         *
         * @param string $name
         * @param string $controller
         * @param array $options
         * @return \Illuminate\Routing\PendingSingletonResourceRegistration 
         * @static 
         */ 
        public static function singleton($name, $controller, $options = [])
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->singleton($name, $controller, $options);
        }
                    /**
         * Register an array of API singleton resource controllers.
         *
         * @param array $singletons
         * @param array $options
         * @return void 
         * @static 
         */ 
        public static function apiSingletons($singletons, $options = [])
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        $instance->apiSingletons($singletons, $options);
        }
                    /**
         * Route an API singleton resource to a controller.
         *
         * @param string $name
         * @param string $controller
         * @param array $options
         * @return \Illuminate\Routing\PendingSingletonResourceRegistration 
         * @static 
         */ 
        public static function apiSingleton($name, $controller, $options = [])
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->apiSingleton($name, $controller, $options);
        }
                    /**
         * Create a route group with shared attributes.
         *
         * @param array $attributes
         * @param \Closure|array|string $routes
         * @return \Illuminate\Routing\Router 
         * @static 
         */ 
        public static function group($attributes, $routes)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->group($attributes, $routes);
        }
                    /**
         * Merge the given array with the last group stack.
         *
         * @param array $new
         * @param bool $prependExistingPrefix
         * @return array 
         * @static 
         */ 
        public static function mergeWithLastGroup($new, $prependExistingPrefix = true)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->mergeWithLastGroup($new, $prependExistingPrefix);
        }
                    /**
         * Get the prefix from the last group on the stack.
         *
         * @return string 
         * @static 
         */ 
        public static function getLastGroupPrefix()
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->getLastGroupPrefix();
        }
                    /**
         * Add a route to the underlying route collection.
         *
         * @param array|string $methods
         * @param string $uri
         * @param array|string|callable|null $action
         * @return \Illuminate\Routing\Route 
         * @static 
         */ 
        public static function addRoute($methods, $uri, $action)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->addRoute($methods, $uri, $action);
        }
                    /**
         * Create a new Route object.
         *
         * @param array|string $methods
         * @param string $uri
         * @param mixed $action
         * @return \Illuminate\Routing\Route 
         * @static 
         */ 
        public static function newRoute($methods, $uri, $action)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->newRoute($methods, $uri, $action);
        }
                    /**
         * Return the response returned by the given route.
         *
         * @param string $name
         * @return \Symfony\Component\HttpFoundation\Response 
         * @static 
         */ 
        public static function respondWithRoute($name)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->respondWithRoute($name);
        }
                    /**
         * Dispatch the request to the application.
         *
         * @param \Illuminate\Http\Request $request
         * @return \Symfony\Component\HttpFoundation\Response 
         * @static 
         */ 
        public static function dispatch($request)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->dispatch($request);
        }
                    /**
         * Dispatch the request to a route and return the response.
         *
         * @param \Illuminate\Http\Request $request
         * @return \Symfony\Component\HttpFoundation\Response 
         * @static 
         */ 
        public static function dispatchToRoute($request)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->dispatchToRoute($request);
        }
                    /**
         * Gather the middleware for the given route with resolved class names.
         *
         * @param \Illuminate\Routing\Route $route
         * @return array 
         * @static 
         */ 
        public static function gatherRouteMiddleware($route)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->gatherRouteMiddleware($route);
        }
                    /**
         * Resolve a flat array of middleware classes from the provided array.
         *
         * @param array $middleware
         * @param array $excluded
         * @return array 
         * @static 
         */ 
        public static function resolveMiddleware($middleware, $excluded = [])
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->resolveMiddleware($middleware, $excluded);
        }
                    /**
         * Create a response instance from the given value.
         *
         * @param \Symfony\Component\HttpFoundation\Request $request
         * @param mixed $response
         * @return \Symfony\Component\HttpFoundation\Response 
         * @static 
         */ 
        public static function prepareResponse($request, $response)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->prepareResponse($request, $response);
        }
                    /**
         * Static version of prepareResponse.
         *
         * @param \Symfony\Component\HttpFoundation\Request $request
         * @param mixed $response
         * @return \Symfony\Component\HttpFoundation\Response 
         * @static 
         */ 
        public static function toResponse($request, $response)
        {
                        return \Illuminate\Routing\Router::toResponse($request, $response);
        }
                    /**
         * Substitute the route bindings onto the route.
         *
         * @param \Illuminate\Routing\Route $route
         * @return \Illuminate\Routing\Route 
         * @throws \Illuminate\Database\Eloquent\ModelNotFoundException<\Illuminate\Database\Eloquent\Model>
         * @throws \Illuminate\Routing\Exceptions\BackedEnumCaseNotFoundException
         * @static 
         */ 
        public static function substituteBindings($route)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->substituteBindings($route);
        }
                    /**
         * Substitute the implicit route bindings for the given route.
         *
         * @param \Illuminate\Routing\Route $route
         * @return void 
         * @throws \Illuminate\Database\Eloquent\ModelNotFoundException<\Illuminate\Database\Eloquent\Model>
         * @throws \Illuminate\Routing\Exceptions\BackedEnumCaseNotFoundException
         * @static 
         */ 
        public static function substituteImplicitBindings($route)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        $instance->substituteImplicitBindings($route);
        }
                    /**
         * Register a route matched event listener.
         *
         * @param string|callable $callback
         * @return void 
         * @static 
         */ 
        public static function matched($callback)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        $instance->matched($callback);
        }
                    /**
         * Get all of the defined middleware short-hand names.
         *
         * @return array 
         * @static 
         */ 
        public static function getMiddleware()
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->getMiddleware();
        }
                    /**
         * Register a short-hand name for a middleware.
         *
         * @param string $name
         * @param string $class
         * @return \Illuminate\Routing\Router 
         * @static 
         */ 
        public static function aliasMiddleware($name, $class)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->aliasMiddleware($name, $class);
        }
                    /**
         * Check if a middlewareGroup with the given name exists.
         *
         * @param string $name
         * @return bool 
         * @static 
         */ 
        public static function hasMiddlewareGroup($name)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->hasMiddlewareGroup($name);
        }
                    /**
         * Get all of the defined middleware groups.
         *
         * @return array 
         * @static 
         */ 
        public static function getMiddlewareGroups()
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->getMiddlewareGroups();
        }
                    /**
         * Register a group of middleware.
         *
         * @param string $name
         * @param array $middleware
         * @return \Illuminate\Routing\Router 
         * @static 
         */ 
        public static function middlewareGroup($name, $middleware)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->middlewareGroup($name, $middleware);
        }
                    /**
         * Add a middleware to the beginning of a middleware group.
         * 
         * If the middleware is already in the group, it will not be added again.
         *
         * @param string $group
         * @param string $middleware
         * @return \Illuminate\Routing\Router 
         * @static 
         */ 
        public static function prependMiddlewareToGroup($group, $middleware)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->prependMiddlewareToGroup($group, $middleware);
        }
                    /**
         * Add a middleware to the end of a middleware group.
         * 
         * If the middleware is already in the group, it will not be added again.
         *
         * @param string $group
         * @param string $middleware
         * @return \Illuminate\Routing\Router 
         * @static 
         */ 
        public static function pushMiddlewareToGroup($group, $middleware)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->pushMiddlewareToGroup($group, $middleware);
        }
                    /**
         * Remove the given middleware from the specified group.
         *
         * @param string $group
         * @param string $middleware
         * @return \Illuminate\Routing\Router 
         * @static 
         */ 
        public static function removeMiddlewareFromGroup($group, $middleware)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->removeMiddlewareFromGroup($group, $middleware);
        }
                    /**
         * Flush the router's middleware groups.
         *
         * @return \Illuminate\Routing\Router 
         * @static 
         */ 
        public static function flushMiddlewareGroups()
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->flushMiddlewareGroups();
        }
                    /**
         * Add a new route parameter binder.
         *
         * @param string $key
         * @param string|callable $binder
         * @return void 
         * @static 
         */ 
        public static function bind($key, $binder)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        $instance->bind($key, $binder);
        }
                    /**
         * Register a model binder for a wildcard.
         *
         * @param string $key
         * @param string $class
         * @param \Closure|null $callback
         * @return void 
         * @static 
         */ 
        public static function model($key, $class, $callback = null)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        $instance->model($key, $class, $callback);
        }
                    /**
         * Get the binding callback for a given binding.
         *
         * @param string $key
         * @return \Closure|null 
         * @static 
         */ 
        public static function getBindingCallback($key)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->getBindingCallback($key);
        }
                    /**
         * Get the global "where" patterns.
         *
         * @return array 
         * @static 
         */ 
        public static function getPatterns()
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->getPatterns();
        }
                    /**
         * Set a global where pattern on all routes.
         *
         * @param string $key
         * @param string $pattern
         * @return void 
         * @static 
         */ 
        public static function pattern($key, $pattern)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        $instance->pattern($key, $pattern);
        }
                    /**
         * Set a group of global where patterns on all routes.
         *
         * @param array $patterns
         * @return void 
         * @static 
         */ 
        public static function patterns($patterns)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        $instance->patterns($patterns);
        }
                    /**
         * Determine if the router currently has a group stack.
         *
         * @return bool 
         * @static 
         */ 
        public static function hasGroupStack()
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->hasGroupStack();
        }
                    /**
         * Get the current group stack for the router.
         *
         * @return array 
         * @static 
         */ 
        public static function getGroupStack()
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->getGroupStack();
        }
                    /**
         * Get a route parameter for the current route.
         *
         * @param string $key
         * @param string|null $default
         * @return mixed 
         * @static 
         */ 
        public static function input($key, $default = null)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->input($key, $default);
        }
                    /**
         * Get the request currently being dispatched.
         *
         * @return \Illuminate\Http\Request 
         * @static 
         */ 
        public static function getCurrentRequest()
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->getCurrentRequest();
        }
                    /**
         * Get the currently dispatched route instance.
         *
         * @return \Illuminate\Routing\Route|null 
         * @static 
         */ 
        public static function getCurrentRoute()
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->getCurrentRoute();
        }
                    /**
         * Get the currently dispatched route instance.
         *
         * @return \Illuminate\Routing\Route|null 
         * @static 
         */ 
        public static function current()
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->current();
        }
                    /**
         * Check if a route with the given name exists.
         *
         * @param string|array $name
         * @return bool 
         * @static 
         */ 
        public static function has($name)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->has($name);
        }
                    /**
         * Get the current route name.
         *
         * @return string|null 
         * @static 
         */ 
        public static function currentRouteName()
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->currentRouteName();
        }
                    /**
         * Alias for the "currentRouteNamed" method.
         *
         * @param mixed $patterns
         * @return bool 
         * @static 
         */ 
        public static function is(...$patterns)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->is(...$patterns);
        }
                    /**
         * Determine if the current route matches a pattern.
         *
         * @param mixed $patterns
         * @return bool 
         * @static 
         */ 
        public static function currentRouteNamed(...$patterns)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->currentRouteNamed(...$patterns);
        }
                    /**
         * Get the current route action.
         *
         * @return string|null 
         * @static 
         */ 
        public static function currentRouteAction()
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->currentRouteAction();
        }
                    /**
         * Alias for the "currentRouteUses" method.
         *
         * @param array $patterns
         * @return bool 
         * @static 
         */ 
        public static function uses(...$patterns)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->uses(...$patterns);
        }
                    /**
         * Determine if the current route action matches a given action.
         *
         * @param string $action
         * @return bool 
         * @static 
         */ 
        public static function currentRouteUses($action)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->currentRouteUses($action);
        }
                    /**
         * Set the unmapped global resource parameters to singular.
         *
         * @param bool $singular
         * @return void 
         * @static 
         */ 
        public static function singularResourceParameters($singular = true)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        $instance->singularResourceParameters($singular);
        }
                    /**
         * Set the global resource parameter mapping.
         *
         * @param array $parameters
         * @return void 
         * @static 
         */ 
        public static function resourceParameters($parameters = [])
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        $instance->resourceParameters($parameters);
        }
                    /**
         * Get or set the verbs used in the resource URIs.
         *
         * @param array $verbs
         * @return array|null 
         * @static 
         */ 
        public static function resourceVerbs($verbs = [])
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->resourceVerbs($verbs);
        }
                    /**
         * Get the underlying route collection.
         *
         * @return \Illuminate\Routing\RouteCollectionInterface 
         * @static 
         */ 
        public static function getRoutes()
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->getRoutes();
        }
                    /**
         * Set the route collection instance.
         *
         * @param \Illuminate\Routing\RouteCollection $routes
         * @return void 
         * @static 
         */ 
        public static function setRoutes($routes)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        $instance->setRoutes($routes);
        }
                    /**
         * Set the compiled route collection instance.
         *
         * @param array $routes
         * @return void 
         * @static 
         */ 
        public static function setCompiledRoutes($routes)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        $instance->setCompiledRoutes($routes);
        }
                    /**
         * Remove any duplicate middleware from the given array.
         *
         * @param array $middleware
         * @return array 
         * @static 
         */ 
        public static function uniqueMiddleware($middleware)
        {
                        return \Illuminate\Routing\Router::uniqueMiddleware($middleware);
        }
                    /**
         * Set the container instance used by the router.
         *
         * @param \Illuminate\Container\Container $container
         * @return \Illuminate\Routing\Router 
         * @static 
         */ 
        public static function setContainer($container)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->setContainer($container);
        }
                    /**
         * Register a custom macro.
         *
         * @param string $name
         * @param object|callable $macro
         * @return void 
         * @static 
         */ 
        public static function macro($name, $macro)
        {
                        \Illuminate\Routing\Router::macro($name, $macro);
        }
                    /**
         * Mix another object into the class.
         *
         * @param object $mixin
         * @param bool $replace
         * @return void 
         * @throws \ReflectionException
         * @static 
         */ 
        public static function mixin($mixin, $replace = true)
        {
                        \Illuminate\Routing\Router::mixin($mixin, $replace);
        }
                    /**
         * Checks if macro is registered.
         *
         * @param string $name
         * @return bool 
         * @static 
         */ 
        public static function hasMacro($name)
        {
                        return \Illuminate\Routing\Router::hasMacro($name);
        }
                    /**
         * Flush the existing macros.
         *
         * @return void 
         * @static 
         */ 
        public static function flushMacros()
        {
                        \Illuminate\Routing\Router::flushMacros();
        }
                    /**
         * Dynamically handle calls to the class.
         *
         * @param string $method
         * @param array $parameters
         * @return mixed 
         * @throws \BadMethodCallException
         * @static 
         */ 
        public static function macroCall($method, $parameters)
        {
                        /** @var \Illuminate\Routing\Router $instance */
                        return $instance->macroCall($method, $parameters);
        }
         
    }
            /**
     * 
     *
     * @see \Illuminate\Database\Schema\Builder
     */ 
        class Schema {
                    /**
         * Create a database in the schema.
         *
         * @param string $name
         * @return bool 
         * @static 
         */ 
        public static function createDatabase($name)
        {
                        /** @var \Illuminate\Database\Schema\PostgresBuilder $instance */
                        return $instance->createDatabase($name);
        }
                    /**
         * Drop a database from the schema if the database exists.
         *
         * @param string $name
         * @return bool 
         * @static 
         */ 
        public static function dropDatabaseIfExists($name)
        {
                        /** @var \Illuminate\Database\Schema\PostgresBuilder $instance */
                        return $instance->dropDatabaseIfExists($name);
        }
                    /**
         * Determine if the given table exists.
         *
         * @param string $table
         * @return bool 
         * @static 
         */ 
        public static function hasTable($table)
        {
                        /** @var \Illuminate\Database\Schema\PostgresBuilder $instance */
                        return $instance->hasTable($table);
        }
                    /**
         * Drop all tables from the database.
         *
         * @return void 
         * @static 
         */ 
        public static function dropAllTables()
        {
                        /** @var \Illuminate\Database\Schema\PostgresBuilder $instance */
                        $instance->dropAllTables();
        }
                    /**
         * Drop all views from the database.
         *
         * @return void 
         * @static 
         */ 
        public static function dropAllViews()
        {
                        /** @var \Illuminate\Database\Schema\PostgresBuilder $instance */
                        $instance->dropAllViews();
        }
                    /**
         * Drop all types from the database.
         *
         * @return void 
         * @static 
         */ 
        public static function dropAllTypes()
        {
                        /** @var \Illuminate\Database\Schema\PostgresBuilder $instance */
                        $instance->dropAllTypes();
        }
                    /**
         * Get all of the table names for the database.
         *
         * @return array 
         * @static 
         */ 
        public static function getAllTables()
        {
                        /** @var \Illuminate\Database\Schema\PostgresBuilder $instance */
                        return $instance->getAllTables();
        }
                    /**
         * Get all of the view names for the database.
         *
         * @return array 
         * @static 
         */ 
        public static function getAllViews()
        {
                        /** @var \Illuminate\Database\Schema\PostgresBuilder $instance */
                        return $instance->getAllViews();
        }
                    /**
         * Get all of the type names for the database.
         *
         * @return array 
         * @static 
         */ 
        public static function getAllTypes()
        {
                        /** @var \Illuminate\Database\Schema\PostgresBuilder $instance */
                        return $instance->getAllTypes();
        }
                    /**
         * Get the column listing for a given table.
         *
         * @param string $table
         * @return array 
         * @static 
         */ 
        public static function getColumnListing($table)
        {
                        /** @var \Illuminate\Database\Schema\PostgresBuilder $instance */
                        return $instance->getColumnListing($table);
        }
                    /**
         * Set the default string length for migrations.
         *
         * @param int $length
         * @return void 
         * @static 
         */ 
        public static function defaultStringLength($length)
        {            //Method inherited from \Illuminate\Database\Schema\Builder         
                        \Illuminate\Database\Schema\PostgresBuilder::defaultStringLength($length);
        }
                    /**
         * Set the default morph key type for migrations.
         *
         * @param string $type
         * @return void 
         * @throws \InvalidArgumentException
         * @static 
         */ 
        public static function defaultMorphKeyType($type)
        {            //Method inherited from \Illuminate\Database\Schema\Builder         
                        \Illuminate\Database\Schema\PostgresBuilder::defaultMorphKeyType($type);
        }
                    /**
         * Set the default morph key type for migrations to UUIDs.
         *
         * @return void 
         * @static 
         */ 
        public static function morphUsingUuids()
        {            //Method inherited from \Illuminate\Database\Schema\Builder         
                        \Illuminate\Database\Schema\PostgresBuilder::morphUsingUuids();
        }
                    /**
         * Set the default morph key type for migrations to ULIDs.
         *
         * @return void 
         * @static 
         */ 
        public static function morphUsingUlids()
        {            //Method inherited from \Illuminate\Database\Schema\Builder         
                        \Illuminate\Database\Schema\PostgresBuilder::morphUsingUlids();
        }
                    /**
         * Attempt to use native schema operations for dropping, renaming, and modifying columns, even if Doctrine DBAL is installed.
         *
         * @param bool $value
         * @return void 
         * @static 
         */ 
        public static function useNativeSchemaOperationsIfPossible($value = true)
        {            //Method inherited from \Illuminate\Database\Schema\Builder         
                        \Illuminate\Database\Schema\PostgresBuilder::useNativeSchemaOperationsIfPossible($value);
        }
                    /**
         * Determine if the given table has a given column.
         *
         * @param string $table
         * @param string $column
         * @return bool 
         * @static 
         */ 
        public static function hasColumn($table, $column)
        {            //Method inherited from \Illuminate\Database\Schema\Builder         
                        /** @var \Illuminate\Database\Schema\PostgresBuilder $instance */
                        return $instance->hasColumn($table, $column);
        }
                    /**
         * Determine if the given table has given columns.
         *
         * @param string $table
         * @param array $columns
         * @return bool 
         * @static 
         */ 
        public static function hasColumns($table, $columns)
        {            //Method inherited from \Illuminate\Database\Schema\Builder         
                        /** @var \Illuminate\Database\Schema\PostgresBuilder $instance */
                        return $instance->hasColumns($table, $columns);
        }
                    /**
         * Execute a table builder callback if the given table has a given column.
         *
         * @param string $table
         * @param string $column
         * @param \Closure $callback
         * @return void 
         * @static 
         */ 
        public static function whenTableHasColumn($table, $column, $callback)
        {            //Method inherited from \Illuminate\Database\Schema\Builder         
                        /** @var \Illuminate\Database\Schema\PostgresBuilder $instance */
                        $instance->whenTableHasColumn($table, $column, $callback);
        }
                    /**
         * Execute a table builder callback if the given table doesn't have a given column.
         *
         * @param string $table
         * @param string $column
         * @param \Closure $callback
         * @return void 
         * @static 
         */ 
        public static function whenTableDoesntHaveColumn($table, $column, $callback)
        {            //Method inherited from \Illuminate\Database\Schema\Builder         
                        /** @var \Illuminate\Database\Schema\PostgresBuilder $instance */
                        $instance->whenTableDoesntHaveColumn($table, $column, $callback);
        }
                    /**
         * Get the data type for the given column name.
         *
         * @param string $table
         * @param string $column
         * @return string 
         * @static 
         */ 
        public static function getColumnType($table, $column)
        {            //Method inherited from \Illuminate\Database\Schema\Builder         
                        /** @var \Illuminate\Database\Schema\PostgresBuilder $instance */
                        return $instance->getColumnType($table, $column);
        }
                    /**
         * Modify a table on the schema.
         *
         * @param string $table
         * @param \Closure $callback
         * @return void 
         * @static 
         */ 
        public static function table($table, $callback)
        {            //Method inherited from \Illuminate\Database\Schema\Builder         
                        /** @var \Illuminate\Database\Schema\PostgresBuilder $instance */
                        $instance->table($table, $callback);
        }
                    /**
         * Create a new table on the schema.
         *
         * @param string $table
         * @param \Closure $callback
         * @return void 
         * @static 
         */ 
        public static function create($table, $callback)
        {            //Method inherited from \Illuminate\Database\Schema\Builder         
                        /** @var \Illuminate\Database\Schema\PostgresBuilder $instance */
                        $instance->create($table, $callback);
        }
                    /**
         * Drop a table from the schema.
         *
         * @param string $table
         * @return void 
         * @static 
         */ 
        public static function drop($table)
        {            //Method inherited from \Illuminate\Database\Schema\Builder         
                        /** @var \Illuminate\Database\Schema\PostgresBuilder $instance */
                        $instance->drop($table);
        }
                    /**
         * Drop a table from the schema if it exists.
         *
         * @param string $table
         * @return void 
         * @static 
         */ 
        public static function dropIfExists($table)
        {            //Method inherited from \Illuminate\Database\Schema\Builder         
                        /** @var \Illuminate\Database\Schema\PostgresBuilder $instance */
                        $instance->dropIfExists($table);
        }
                    /**
         * Drop columns from a table schema.
         *
         * @param string $table
         * @param string|array $columns
         * @return void 
         * @static 
         */ 
        public static function dropColumns($table, $columns)
        {            //Method inherited from \Illuminate\Database\Schema\Builder         
                        /** @var \Illuminate\Database\Schema\PostgresBuilder $instance */
                        $instance->dropColumns($table, $columns);
        }
                    /**
         * Rename a table on the schema.
         *
         * @param string $from
         * @param string $to
         * @return void 
         * @static 
         */ 
        public static function rename($from, $to)
        {            //Method inherited from \Illuminate\Database\Schema\Builder         
                        /** @var \Illuminate\Database\Schema\PostgresBuilder $instance */
                        $instance->rename($from, $to);
        }
                    /**
         * Enable foreign key constraints.
         *
         * @return bool 
         * @static 
         */ 
        public static function enableForeignKeyConstraints()
        {            //Method inherited from \Illuminate\Database\Schema\Builder         
                        /** @var \Illuminate\Database\Schema\PostgresBuilder $instance */
                        return $instance->enableForeignKeyConstraints();
        }
                    /**
         * Disable foreign key constraints.
         *
         * @return bool 
         * @static 
         */ 
        public static function disableForeignKeyConstraints()
        {            //Method inherited from \Illuminate\Database\Schema\Builder         
                        /** @var \Illuminate\Database\Schema\PostgresBuilder $instance */
                        return $instance->disableForeignKeyConstraints();
        }
                    /**
         * Disable foreign key constraints during the execution of a callback.
         *
         * @param \Closure $callback
         * @return mixed 
         * @static 
         */ 
        public static function withoutForeignKeyConstraints($callback)
        {            //Method inherited from \Illuminate\Database\Schema\Builder         
                        /** @var \Illuminate\Database\Schema\PostgresBuilder $instance */
                        return $instance->withoutForeignKeyConstraints($callback);
        }
                    /**
         * Get the database connection instance.
         *
         * @return \Illuminate\Database\Connection 
         * @static 
         */ 
        public static function getConnection()
        {            //Method inherited from \Illuminate\Database\Schema\Builder         
                        /** @var \Illuminate\Database\Schema\PostgresBuilder $instance */
                        return $instance->getConnection();
        }
                    /**
         * Set the database connection instance.
         *
         * @param \Illuminate\Database\Connection $connection
         * @return \Illuminate\Database\Schema\PostgresBuilder 
         * @static 
         */ 
        public static function setConnection($connection)
        {            //Method inherited from \Illuminate\Database\Schema\Builder         
                        /** @var \Illuminate\Database\Schema\PostgresBuilder $instance */
                        return $instance->setConnection($connection);
        }
                    /**
         * Set the Schema Blueprint resolver callback.
         *
         * @param \Closure $resolver
         * @return void 
         * @static 
         */ 
        public static function blueprintResolver($resolver)
        {            //Method inherited from \Illuminate\Database\Schema\Builder         
                        /** @var \Illuminate\Database\Schema\PostgresBuilder $instance */
                        $instance->blueprintResolver($resolver);
        }
         
    }
     
}

    namespace Fruitcake\TelescopeToolbar { 
            /**
     * 
     *
     */ 
        class Toolbar {
         
    }
     
}

    namespace LaravelDoctrine\ORM\Facades { 
            /**
     * 
     *
     */ 
        class Registry {
                    /**
         * 
         *
         * @param $manager
         * @param array $settings
         * @static 
         */ 
        public static function addManager($manager, $settings = [])
        {
                        /** @var \LaravelDoctrine\ORM\IlluminateRegistry $instance */
                        return $instance->addManager($manager, $settings);
        }
                    /**
         * 
         *
         * @param $connection
         * @param array $settings
         * @static 
         */ 
        public static function addConnection($connection, $settings = [])
        {
                        /** @var \LaravelDoctrine\ORM\IlluminateRegistry $instance */
                        return $instance->addConnection($connection, $settings);
        }
                    /**
         * Gets the default connection name.
         *
         * @return string The default connection name.
         * @static 
         */ 
        public static function getDefaultConnectionName()
        {
                        /** @var \LaravelDoctrine\ORM\IlluminateRegistry $instance */
                        return $instance->getDefaultConnectionName();
        }
                    /**
         * Gets the named connection.
         *
         * @param string $name The connection name (null for the default one).
         * @return object 
         * @static 
         */ 
        public static function getConnection($name = null)
        {
                        /** @var \LaravelDoctrine\ORM\IlluminateRegistry $instance */
                        return $instance->getConnection($name);
        }
                    /**
         * 
         *
         * @param string $name
         * @return bool 
         * @static 
         */ 
        public static function connectionExists($name)
        {
                        /** @var \LaravelDoctrine\ORM\IlluminateRegistry $instance */
                        return $instance->connectionExists($name);
        }
                    /**
         * Gets an array of all registered connections.
         *
         * @return array An array of Connection instances.
         * @static 
         */ 
        public static function getConnections()
        {
                        /** @var \LaravelDoctrine\ORM\IlluminateRegistry $instance */
                        return $instance->getConnections();
        }
                    /**
         * Gets all connection names.
         *
         * @return array An array of connection names.
         * @static 
         */ 
        public static function getConnectionNames()
        {
                        /** @var \LaravelDoctrine\ORM\IlluminateRegistry $instance */
                        return $instance->getConnectionNames();
        }
                    /**
         * Gets the default object manager name.
         *
         * @return string The default object manager name.
         * @static 
         */ 
        public static function getDefaultManagerName()
        {
                        /** @var \LaravelDoctrine\ORM\IlluminateRegistry $instance */
                        return $instance->getDefaultManagerName();
        }
                    /**
         * Gets a named object manager.
         *
         * @param string $name The object manager name (null for the default one).
         * @return \Doctrine\Persistence\ObjectManager 
         * @static 
         */ 
        public static function getManager($name = null)
        {
                        /** @var \LaravelDoctrine\ORM\IlluminateRegistry $instance */
                        return $instance->getManager($name);
        }
                    /**
         * 
         *
         * @param string $name
         * @return bool 
         * @static 
         */ 
        public static function managerExists($name)
        {
                        /** @var \LaravelDoctrine\ORM\IlluminateRegistry $instance */
                        return $instance->managerExists($name);
        }
                    /**
         * Gets all connection names.
         *
         * @return array An array of connection names.
         * @static 
         */ 
        public static function getManagerNames()
        {
                        /** @var \LaravelDoctrine\ORM\IlluminateRegistry $instance */
                        return $instance->getManagerNames();
        }
                    /**
         * Gets an array of all registered object managers.
         *
         * @return \Doctrine\Persistence\ObjectManager[] An array of ObjectManager instances
         * @static 
         */ 
        public static function getManagers()
        {
                        /** @var \LaravelDoctrine\ORM\IlluminateRegistry $instance */
                        return $instance->getManagers();
        }
                    /**
         * Close an existing object manager.
         *
         * @param string|null $name The object manager name (null for the default one).
         * @static 
         */ 
        public static function closeManager($name = null)
        {
                        /** @var \LaravelDoctrine\ORM\IlluminateRegistry $instance */
                        return $instance->closeManager($name);
        }
                    /**
         * Purge a named object manager.
         * 
         * This method can be used if you wish to close an object manager manually, without opening a new one.
         * This can be useful if you wish to open a new manager later (but maybe with different settings).
         *
         * @param string|null $name The object manager name (null for the default one).
         * @static 
         */ 
        public static function purgeManager($name = null)
        {
                        /** @var \LaravelDoctrine\ORM\IlluminateRegistry $instance */
                        return $instance->purgeManager($name);
        }
                    /**
         * Resets a named object manager.
         * 
         * This method is useful when an object manager has been closed
         * because of a rollbacked transaction AND when you think that
         * it makes sense to get a new one to replace the closed one.
         * Be warned that you will get a brand new object manager as
         * the existing one is not useable anymore. This means that any
         * other object with a dependency on this object manager will
         * hold an obsolete reference. You can inject the registry instead
         * to avoid this problem.
         *
         * @param string|null $name The object manager name (null for the default one).
         * @return \Doctrine\Persistence\ObjectManager 
         * @static 
         */ 
        public static function resetManager($name = null)
        {
                        /** @var \LaravelDoctrine\ORM\IlluminateRegistry $instance */
                        return $instance->resetManager($name);
        }
                    /**
         * Resolves a registered namespace alias to the full namespace.
         * 
         * This method looks for the alias in all registered object managers.
         *
         * @param string $alias The alias.
         * @throws ORMException
         * @return string The full namespace.
         * @static 
         */ 
        public static function getAliasNamespace($alias)
        {
                        /** @var \LaravelDoctrine\ORM\IlluminateRegistry $instance */
                        return $instance->getAliasNamespace($alias);
        }
                    /**
         * Gets the ObjectRepository for an persistent object.
         *
         * @param string $persistentObject The name of the persistent object.
         * @param string $persistentManagerName The object manager name (null for the default one).
         * @return \Doctrine\Persistence\ObjectRepository 
         * @static 
         */ 
        public static function getRepository($persistentObject, $persistentManagerName = null)
        {
                        /** @var \LaravelDoctrine\ORM\IlluminateRegistry $instance */
                        return $instance->getRepository($persistentObject, $persistentManagerName);
        }
                    /**
         * Gets the object manager associated with a given class.
         *
         * @param string $class A persistent object class name.
         * @return \Doctrine\Persistence\ObjectManager|null 
         * @static 
         */ 
        public static function getManagerForClass($class)
        {
                        /** @var \LaravelDoctrine\ORM\IlluminateRegistry $instance */
                        return $instance->getManagerForClass($class);
        }
                    /**
         * 
         *
         * @param string $defaultManager
         * @static 
         */ 
        public static function setDefaultManager($defaultManager)
        {
                        /** @var \LaravelDoctrine\ORM\IlluminateRegistry $instance */
                        return $instance->setDefaultManager($defaultManager);
        }
                    /**
         * 
         *
         * @param string $defaultConnection
         * @static 
         */ 
        public static function setDefaultConnection($defaultConnection)
        {
                        /** @var \LaravelDoctrine\ORM\IlluminateRegistry $instance */
                        return $instance->setDefaultConnection($defaultConnection);
        }
         
    }
            /**
     * 
     *
     */ 
        class Doctrine {
                    /**
         * 
         *
         * @return string 
         * @static 
         */ 
        public static function getDefaultManagerName()
        {
                        /** @var \LaravelDoctrine\ORM\DoctrineManager $instance */
                        return $instance->getDefaultManagerName();
        }
                    /**
         * 
         *
         * @param $callback
         * @static 
         */ 
        public static function onResolve($callback)
        {
                        /** @var \LaravelDoctrine\ORM\DoctrineManager $instance */
                        return $instance->onResolve($callback);
        }
                    /**
         * 
         *
         * @param string|null $connection
         * @param string|callable $callback
         * @static 
         */ 
        public static function extend($connection, $callback)
        {
                        /** @var \LaravelDoctrine\ORM\DoctrineManager $instance */
                        return $instance->extend($connection, $callback);
        }
                    /**
         * 
         *
         * @param string|callable $callback
         * @static 
         */ 
        public static function extendAll($callback)
        {
                        /** @var \LaravelDoctrine\ORM\DoctrineManager $instance */
                        return $instance->extendAll($callback);
        }
                    /**
         * 
         *
         * @param array $paths
         * @param string|null $connection
         * @static 
         */ 
        public static function addPaths($paths = [], $connection = null)
        {
                        /** @var \LaravelDoctrine\ORM\DoctrineManager $instance */
                        return $instance->addPaths($paths, $connection);
        }
                    /**
         * 
         *
         * @param array $mappings
         * @param string|null $connection
         * @static 
         */ 
        public static function addMappings($mappings = [], $connection = null)
        {
                        /** @var \LaravelDoctrine\ORM\DoctrineManager $instance */
                        return $instance->addMappings($mappings, $connection);
        }
                    /**
         * 
         *
         * @param string|null $connection
         * @param \Doctrine\Persistence\ManagerRegistry $registry
         * @return \Doctrine\Persistence\Mapping\Driver\MappingDriver 
         * @static 
         */ 
        public static function getMetaDataDriver($connection, $registry)
        {
                        /** @var \LaravelDoctrine\ORM\DoctrineManager $instance */
                        return $instance->getMetaDataDriver($connection, $registry);
        }
         
    }
            /**
     * 
     *
     * @method static \Doctrine\ORM\Utility\IdentifierFlattener getIdentifierFlattener()
     */ 
        class EntityManager {
                    /**
         * {@inheritDoc}
         *
         * @static 
         */ 
        public static function getConnection()
        {
                        /** @var \Doctrine\ORM\EntityManager $instance */
                        return $instance->getConnection();
        }
                    /**
         * Gets the metadata factory used to gather the metadata of classes.
         *
         * @return \Doctrine\ORM\Mapping\ClassMetadataFactory 
         * @static 
         */ 
        public static function getMetadataFactory()
        {
                        /** @var \Doctrine\ORM\EntityManager $instance */
                        return $instance->getMetadataFactory();
        }
                    /**
         * {@inheritDoc}
         *
         * @static 
         */ 
        public static function getExpressionBuilder()
        {
                        /** @var \Doctrine\ORM\EntityManager $instance */
                        return $instance->getExpressionBuilder();
        }
                    /**
         * {@inheritDoc}
         *
         * @static 
         */ 
        public static function beginTransaction()
        {
                        /** @var \Doctrine\ORM\EntityManager $instance */
                        return $instance->beginTransaction();
        }
                    /**
         * {@inheritDoc}
         *
         * @static 
         */ 
        public static function getCache()
        {
                        /** @var \Doctrine\ORM\EntityManager $instance */
                        return $instance->getCache();
        }
                    /**
         * {@inheritDoc}
         *
         * @static 
         */ 
        public static function transactional($func)
        {
                        /** @var \Doctrine\ORM\EntityManager $instance */
                        return $instance->transactional($func);
        }
                    /**
         * {@inheritDoc}
         *
         * @static 
         */ 
        public static function wrapInTransaction($func)
        {
                        /** @var \Doctrine\ORM\EntityManager $instance */
                        return $instance->wrapInTransaction($func);
        }
                    /**
         * {@inheritDoc}
         *
         * @static 
         */ 
        public static function commit()
        {
                        /** @var \Doctrine\ORM\EntityManager $instance */
                        return $instance->commit();
        }
                    /**
         * {@inheritDoc}
         *
         * @static 
         */ 
        public static function rollback()
        {
                        /** @var \Doctrine\ORM\EntityManager $instance */
                        return $instance->rollback();
        }
                    /**
         * Returns the ORM metadata descriptor for a class.
         * 
         * The class name must be the fully-qualified class name without a leading backslash
         * (as it is returned by get_class($obj)) or an aliased class name.
         * 
         * Examples:
         * MyProject\Domain\User
         * sales:PriceRequest
         * 
         * Internal note: Performance-sensitive method.
         * 
         * {@inheritDoc}
         *
         * @static 
         */ 
        public static function getClassMetadata($className)
        {
                        /** @var \Doctrine\ORM\EntityManager $instance */
                        return $instance->getClassMetadata($className);
        }
                    /**
         * {@inheritDoc}
         *
         * @static 
         */ 
        public static function createQuery($dql = '')
        {
                        /** @var \Doctrine\ORM\EntityManager $instance */
                        return $instance->createQuery($dql);
        }
                    /**
         * {@inheritDoc}
         *
         * @static 
         */ 
        public static function createNamedQuery($name)
        {
                        /** @var \Doctrine\ORM\EntityManager $instance */
                        return $instance->createNamedQuery($name);
        }
                    /**
         * {@inheritDoc}
         *
         * @static 
         */ 
        public static function createNativeQuery($sql, $rsm)
        {
                        /** @var \Doctrine\ORM\EntityManager $instance */
                        return $instance->createNativeQuery($sql, $rsm);
        }
                    /**
         * {@inheritDoc}
         *
         * @static 
         */ 
        public static function createNamedNativeQuery($name)
        {
                        /** @var \Doctrine\ORM\EntityManager $instance */
                        return $instance->createNamedNativeQuery($name);
        }
                    /**
         * {@inheritDoc}
         *
         * @static 
         */ 
        public static function createQueryBuilder()
        {
                        /** @var \Doctrine\ORM\EntityManager $instance */
                        return $instance->createQueryBuilder();
        }
                    /**
         * Flushes all changes to objects that have been queued up to now to the database.
         * 
         * This effectively synchronizes the in-memory state of managed objects with the
         * database.
         * 
         * If an entity is explicitly passed to this method only this entity and
         * the cascade-persist semantics + scheduled inserts/removals are synchronized.
         *
         * @param object|mixed[]|null $entity
         * @return void 
         * @throws OptimisticLockException If a version check on an entity that
         * makes use of optimistic locking fails.
         * @throws ORMException
         * @static 
         */ 
        public static function flush($entity = null)
        {
                        /** @var \Doctrine\ORM\EntityManager $instance */
                        $instance->flush($entity);
        }
                    /**
         * Finds an Entity by its identifier.
         *
         * @param string $className The class name of the entity to find.
         * @param mixed $id The identity of the entity to find.
         * @param int|null $lockMode One of the \Doctrine\DBAL\LockMode::* constants
         *    or NULL if no specific lock mode should be used
         *    during the search.
         * @param int|null $lockVersion The version of the entity to find when using
         * optimistic locking.
         * @psalm-param class-string<T> $className
         * @psalm-param LockMode::*|null $lockMode
         * @return object|null The entity instance or NULL if the entity can not be found.
         * @psalm-return ?T
         * @throws OptimisticLockException
         * @throws ORMInvalidArgumentException
         * @throws TransactionRequiredException
         * @throws ORMException
         * @template T
         * @static 
         */ 
        public static function find($className, $id, $lockMode = null, $lockVersion = null)
        {
                        /** @var \Doctrine\ORM\EntityManager $instance */
                        return $instance->find($className, $id, $lockMode, $lockVersion);
        }
                    /**
         * {@inheritDoc}
         *
         * @static 
         */ 
        public static function getReference($entityName, $id)
        {
                        /** @var \Doctrine\ORM\EntityManager $instance */
                        return $instance->getReference($entityName, $id);
        }
                    /**
         * {@inheritDoc}
         *
         * @static 
         */ 
        public static function getPartialReference($entityName, $identifier)
        {
                        /** @var \Doctrine\ORM\EntityManager $instance */
                        return $instance->getPartialReference($entityName, $identifier);
        }
                    /**
         * Clears the EntityManager. All entities that are currently managed
         * by this EntityManager become detached.
         *
         * @param string|null $entityName if given, only entities of this type will get detached
         * @return void 
         * @throws ORMInvalidArgumentException If a non-null non-string value is given.
         * @throws MappingException            If a $entityName is given, but that entity is not
         *                                     found in the mappings.
         * @static 
         */ 
        public static function clear($entityName = null)
        {
                        /** @var \Doctrine\ORM\EntityManager $instance */
                        $instance->clear($entityName);
        }
                    /**
         * {@inheritDoc}
         *
         * @static 
         */ 
        public static function close()
        {
                        /** @var \Doctrine\ORM\EntityManager $instance */
                        return $instance->close();
        }
                    /**
         * Tells the EntityManager to make an instance managed and persistent.
         * 
         * The entity will be entered into the database at or before transaction
         * commit or as a result of the flush operation.
         * 
         * NOTE: The persist operation always considers entities that are not yet known to
         * this EntityManager as NEW. Do not pass detached entities to the persist operation.
         *
         * @param object $entity The instance to make managed and persistent.
         * @return void 
         * @throws ORMInvalidArgumentException
         * @throws ORMException
         * @static 
         */ 
        public static function persist($entity)
        {
                        /** @var \Doctrine\ORM\EntityManager $instance */
                        $instance->persist($entity);
        }
                    /**
         * Removes an entity instance.
         * 
         * A removed entity will be removed from the database at or before transaction commit
         * or as a result of the flush operation.
         *
         * @param object $entity The entity instance to remove.
         * @return void 
         * @throws ORMInvalidArgumentException
         * @throws ORMException
         * @static 
         */ 
        public static function remove($entity)
        {
                        /** @var \Doctrine\ORM\EntityManager $instance */
                        $instance->remove($entity);
        }
                    /**
         * Refreshes the persistent state of an entity from the database,
         * overriding any local changes that have not yet been persisted.
         *
         * @param object $entity The entity to refresh
         * @psalm-param LockMode::*|null $lockMode
         * @return void 
         * @throws ORMInvalidArgumentException
         * @throws ORMException
         * @throws TransactionRequiredException
         * @static 
         */ 
        public static function refresh($entity, $lockMode = null)
        {
                        /** @var \Doctrine\ORM\EntityManager $instance */
                        $instance->refresh($entity, $lockMode);
        }
                    /**
         * Detaches an entity from the EntityManager, causing a managed entity to
         * become detached.  Unflushed changes made to the entity if any
         * (including removal of the entity), will not be synchronized to the database.
         * 
         * Entities which previously referenced the detached entity will continue to
         * reference it.
         *
         * @param object $entity The entity to detach.
         * @return void 
         * @throws ORMInvalidArgumentException
         * @static 
         */ 
        public static function detach($entity)
        {
                        /** @var \Doctrine\ORM\EntityManager $instance */
                        $instance->detach($entity);
        }
                    /**
         * Merges the state of a detached entity into the persistence context
         * of this EntityManager and returns the managed copy of the entity.
         * 
         * The entity passed to merge will not become associated/managed with this EntityManager.
         *
         * @deprecated 2.7 This method is being removed from the ORM and won't have any replacement
         * @param object $entity The detached entity to merge into the persistence context.
         * @return object The managed copy of the entity.
         * @throws ORMInvalidArgumentException
         * @throws ORMException
         * @static 
         */ 
        public static function merge($entity)
        {
                        /** @var \Doctrine\ORM\EntityManager $instance */
                        return $instance->merge($entity);
        }
                    /**
         * {@inheritDoc}
         *
         * @psalm-return never
         * @static 
         */ 
        public static function copy($entity, $deep = false)
        {
                        /** @var \Doctrine\ORM\EntityManager $instance */
                        return $instance->copy($entity, $deep);
        }
                    /**
         * {@inheritDoc}
         *
         * @static 
         */ 
        public static function lock($entity, $lockMode, $lockVersion = null)
        {
                        /** @var \Doctrine\ORM\EntityManager $instance */
                        return $instance->lock($entity, $lockMode, $lockVersion);
        }
                    /**
         * Gets the repository for an entity class.
         *
         * @param string $entityName The name of the entity.
         * @psalm-param class-string<T> $entityName
         * @return \Doctrine\Persistence\ObjectRepository|\Doctrine\ORM\EntityRepository The repository class.
         * @psalm-return EntityRepository<T>
         * @template T of object
         * @static 
         */ 
        public static function getRepository($entityName)
        {
                        /** @var \Doctrine\ORM\EntityManager $instance */
                        return $instance->getRepository($entityName);
        }
                    /**
         * Determines whether an entity instance is managed in this EntityManager.
         *
         * @param object $entity
         * @return bool TRUE if this EntityManager currently manages the given entity, FALSE otherwise.
         * @static 
         */ 
        public static function contains($entity)
        {
                        /** @var \Doctrine\ORM\EntityManager $instance */
                        return $instance->contains($entity);
        }
                    /**
         * {@inheritDoc}
         *
         * @static 
         */ 
        public static function getEventManager()
        {
                        /** @var \Doctrine\ORM\EntityManager $instance */
                        return $instance->getEventManager();
        }
                    /**
         * {@inheritDoc}
         *
         * @static 
         */ 
        public static function getConfiguration()
        {
                        /** @var \Doctrine\ORM\EntityManager $instance */
                        return $instance->getConfiguration();
        }
                    /**
         * {@inheritDoc}
         *
         * @static 
         */ 
        public static function isOpen()
        {
                        /** @var \Doctrine\ORM\EntityManager $instance */
                        return $instance->isOpen();
        }
                    /**
         * {@inheritDoc}
         *
         * @static 
         */ 
        public static function getUnitOfWork()
        {
                        /** @var \Doctrine\ORM\EntityManager $instance */
                        return $instance->getUnitOfWork();
        }
                    /**
         * {@inheritDoc}
         *
         * @static 
         */ 
        public static function getHydrator($hydrationMode)
        {
                        /** @var \Doctrine\ORM\EntityManager $instance */
                        return $instance->getHydrator($hydrationMode);
        }
                    /**
         * {@inheritDoc}
         *
         * @static 
         */ 
        public static function newHydrator($hydrationMode)
        {
                        /** @var \Doctrine\ORM\EntityManager $instance */
                        return $instance->newHydrator($hydrationMode);
        }
                    /**
         * {@inheritDoc}
         *
         * @static 
         */ 
        public static function getProxyFactory()
        {
                        /** @var \Doctrine\ORM\EntityManager $instance */
                        return $instance->getProxyFactory();
        }
                    /**
         * {@inheritDoc}
         *
         * @static 
         */ 
        public static function initializeObject($obj)
        {
                        /** @var \Doctrine\ORM\EntityManager $instance */
                        return $instance->initializeObject($obj);
        }
                    /**
         * {@inheritDoc}
         *
         * @static 
         */ 
        public static function isUninitializedObject($obj)
        {
                        /** @var \Doctrine\ORM\EntityManager $instance */
                        return $instance->isUninitializedObject($obj);
        }
                    /**
         * Factory method to create EntityManager instances.
         *
         * @deprecated Use {@see DriverManager::getConnection()} to bootstrap the connection and call the constructor.
         * @param mixed[]|\Doctrine\DBAL\Connection $connection An array with the connection parameters or an existing Connection instance.
         * @param \Doctrine\ORM\Configuration $config The Configuration instance to use.
         * @param \Doctrine\Common\EventManager|null $eventManager The EventManager instance to use.
         * @psalm-param array<string, mixed>|Connection $connection
         * @return \EntityManager The created EntityManager.
         * @throws InvalidArgumentException
         * @throws ORMException
         * @static 
         */ 
        public static function create($connection, $config, $eventManager = null)
        {
                        return \Doctrine\ORM\EntityManager::create($connection, $config, $eventManager);
        }
                    /**
         * {@inheritDoc}
         *
         * @static 
         */ 
        public static function getFilters()
        {
                        /** @var \Doctrine\ORM\EntityManager $instance */
                        return $instance->getFilters();
        }
                    /**
         * {@inheritDoc}
         *
         * @static 
         */ 
        public static function isFiltersStateClean()
        {
                        /** @var \Doctrine\ORM\EntityManager $instance */
                        return $instance->isFiltersStateClean();
        }
                    /**
         * {@inheritDoc}
         *
         * @static 
         */ 
        public static function hasFilters()
        {
                        /** @var \Doctrine\ORM\EntityManager $instance */
                        return $instance->hasFilters();
        }
         
    }
     
}

    namespace Sentry\Laravel { 
            /**
     * 
     *
     * @see \Sentry\State\HubInterface
     */ 
        class Facade {
                    /**
         * Gets the client bound to the top of the stack.
         *
         * @static 
         */ 
        public static function getClient()
        {
                        /** @var \Sentry\State\Hub $instance */
                        return $instance->getClient();
        }
                    /**
         * Gets the ID of the last captured event.
         *
         * @static 
         */ 
        public static function getLastEventId()
        {
                        /** @var \Sentry\State\Hub $instance */
                        return $instance->getLastEventId();
        }
                    /**
         * Creates a new scope to store context information that will be layered on
         * top of the current one. It is isolated, i.e. all breadcrumbs and context
         * information added to this scope will be removed once the scope ends. Be
         * sure to always remove this scope with {@see Hub::popScope} when the
         * operation finishes or throws.
         *
         * @static 
         */ 
        public static function pushScope()
        {
                        /** @var \Sentry\State\Hub $instance */
                        return $instance->pushScope();
        }
                    /**
         * Removes a previously pushed scope from the stack. This restores the state
         * before the scope was pushed. All breadcrumbs and context information added
         * since the last call to {@see Hub::pushScope} are discarded.
         *
         * @static 
         */ 
        public static function popScope()
        {
                        /** @var \Sentry\State\Hub $instance */
                        return $instance->popScope();
        }
                    /**
         * Creates a new scope with and executes the given operation within. The scope
         * is automatically removed once the operation finishes or throws.
         *
         * @param callable $callback The callback to be executed
         * @return mixed|void The callback's return value, upon successful execution
         * @psalm-template T
         * @psalm-param callable(Scope): T $callback
         * @psalm-return T
         * @static 
         */ 
        public static function withScope($callback)
        {
                        /** @var \Sentry\State\Hub $instance */
                        return $instance->withScope($callback);
        }
                    /**
         * Calls the given callback passing to it the current scope so that any
         * operation can be run within its context.
         *
         * @param callable $callback The callback to be executed
         * @static 
         */ 
        public static function configureScope($callback)
        {
                        /** @var \Sentry\State\Hub $instance */
                        return $instance->configureScope($callback);
        }
                    /**
         * Binds the given client to the current scope.
         *
         * @param \Sentry\ClientInterface $client The client
         * @static 
         */ 
        public static function bindClient($client)
        {
                        /** @var \Sentry\State\Hub $instance */
                        return $instance->bindClient($client);
        }
                    /**
         * Captures a message event and sends it to Sentry.
         *
         * @param string $message The message
         * @param \Sentry\Severity|null $level The severity level of the message
         * @param \Sentry\EventHint|null $hint Object that can contain additional information about the event
         * @static 
         */ 
        public static function captureMessage($message, $level = null, $hint = null)
        {
                        /** @var \Sentry\State\Hub $instance */
                        return $instance->captureMessage($message, $level, $hint);
        }
                    /**
         * Captures an exception event and sends it to Sentry.
         *
         * @param \Throwable $exception The exception
         * @param \Sentry\EventHint|null $hint Object that can contain additional information about the event
         * @static 
         */ 
        public static function captureException($exception, $hint = null)
        {
                        /** @var \Sentry\State\Hub $instance */
                        return $instance->captureException($exception, $hint);
        }
                    /**
         * Captures a new event using the provided data.
         *
         * @param \Sentry\Event $event The event being captured
         * @param \Sentry\EventHint|null $hint May contain additional information about the event
         * @static 
         */ 
        public static function captureEvent($event, $hint = null)
        {
                        /** @var \Sentry\State\Hub $instance */
                        return $instance->captureEvent($event, $hint);
        }
                    /**
         * Captures an event that logs the last occurred error.
         *
         * @param \Sentry\EventHint|null $hint Object that can contain additional information about the event
         * @static 
         */ 
        public static function captureLastError($hint = null)
        {
                        /** @var \Sentry\State\Hub $instance */
                        return $instance->captureLastError($hint);
        }
                    /**
         * 
         *
         * @param string $slug Identifier of the Monitor
         * @param \Sentry\CheckInStatus $status The status of the check-in
         * @param int|float|null $duration The duration of the check-in
         * @param \Sentry\MonitorConfig|null $monitorConfig Configuration of the Monitor
         * @param string|null $checkInId A check-in ID from the previous check-in
         * @static 
         */ 
        public static function captureCheckIn($slug, $status, $duration = null, $monitorConfig = null, $checkInId = null)
        {
                        /** @var \Sentry\State\Hub $instance */
                        return $instance->captureCheckIn($slug, $status, $duration, $monitorConfig, $checkInId);
        }
                    /**
         * Records a new breadcrumb which will be attached to future events. They
         * will be added to subsequent events to provide more context on user's
         * actions prior to an error or crash.
         *
         * @param \Sentry\Breadcrumb $breadcrumb The breadcrumb to record
         * @return bool Whether the breadcrumb was actually added to the current scope
         * @static 
         */ 
        public static function addBreadcrumb($breadcrumb)
        {
                        /** @var \Sentry\State\Hub $instance */
                        return $instance->addBreadcrumb($breadcrumb);
        }
                    /**
         * Gets the integration whose FQCN matches the given one if it's available on the current client.
         *
         * @param string $className The FQCN of the integration
         * @psalm-template T of IntegrationInterface
         * @psalm-param class-string<T> $className
         * @psalm-return T|null
         * @static 
         */ 
        public static function getIntegration($className)
        {
                        /** @var \Sentry\State\Hub $instance */
                        return $instance->getIntegration($className);
        }
                    /**
         * Starts a new `Transaction` and returns it. This is the entry point to manual
         * tracing instrumentation.
         * 
         * A tree structure can be built by adding child spans to the transaction, and
         * child spans to other spans. To start a new child span within the transaction
         * or any span, call the respective `startChild()` method.
         * 
         * Every child span must be finished before the transaction is finished,
         * otherwise the unfinished spans are discarded.
         * 
         * The transaction must be finished with a call to its `finish()` method, at
         * which point the transaction with all its finished child spans will be sent to
         * Sentry.
         *
         * @param array<string, mixed> $customSamplingContext Additional context that will be passed to the {@see SamplingContext}
         * @param \Sentry\Tracing\TransactionContext $context Properties of the new transaction
         * @param array<string, mixed> $customSamplingContext Additional context that will be passed to the {@see SamplingContext}
         * @static 
         */ 
        public static function startTransaction($context, $customSamplingContext = [])
        {
                        /** @var \Sentry\State\Hub $instance */
                        return $instance->startTransaction($context, $customSamplingContext);
        }
                    /**
         * Returns the transaction that is on the Hub.
         *
         * @static 
         */ 
        public static function getTransaction()
        {
                        /** @var \Sentry\State\Hub $instance */
                        return $instance->getTransaction();
        }
                    /**
         * Sets the span on the Hub.
         *
         * @param \Sentry\Tracing\Span|null $span The span
         * @static 
         */ 
        public static function setSpan($span)
        {
                        /** @var \Sentry\State\Hub $instance */
                        return $instance->setSpan($span);
        }
                    /**
         * Returns the span that is on the Hub.
         *
         * @static 
         */ 
        public static function getSpan()
        {
                        /** @var \Sentry\State\Hub $instance */
                        return $instance->getSpan();
        }
         
    }
     
}

    namespace Spatie\LaravelIgnition\Facades { 
            /**
     * 
     *
     * @see \Spatie\FlareClient\Flare
     */ 
        class Flare {
                    /**
         * 
         *
         * @static 
         */ 
        public static function make($apiKey = null, $contextDetector = null)
        {
                        return \Spatie\FlareClient\Flare::make($apiKey, $contextDetector);
        }
                    /**
         * 
         *
         * @static 
         */ 
        public static function setApiToken($apiToken)
        {
                        /** @var \Spatie\FlareClient\Flare $instance */
                        return $instance->setApiToken($apiToken);
        }
                    /**
         * 
         *
         * @static 
         */ 
        public static function apiTokenSet()
        {
                        /** @var \Spatie\FlareClient\Flare $instance */
                        return $instance->apiTokenSet();
        }
                    /**
         * 
         *
         * @static 
         */ 
        public static function setBaseUrl($baseUrl)
        {
                        /** @var \Spatie\FlareClient\Flare $instance */
                        return $instance->setBaseUrl($baseUrl);
        }
                    /**
         * 
         *
         * @static 
         */ 
        public static function setStage($stage)
        {
                        /** @var \Spatie\FlareClient\Flare $instance */
                        return $instance->setStage($stage);
        }
                    /**
         * 
         *
         * @static 
         */ 
        public static function sendReportsImmediately()
        {
                        /** @var \Spatie\FlareClient\Flare $instance */
                        return $instance->sendReportsImmediately();
        }
                    /**
         * 
         *
         * @static 
         */ 
        public static function determineVersionUsing($determineVersionCallable)
        {
                        /** @var \Spatie\FlareClient\Flare $instance */
                        return $instance->determineVersionUsing($determineVersionCallable);
        }
                    /**
         * 
         *
         * @static 
         */ 
        public static function reportErrorLevels($reportErrorLevels)
        {
                        /** @var \Spatie\FlareClient\Flare $instance */
                        return $instance->reportErrorLevels($reportErrorLevels);
        }
                    /**
         * 
         *
         * @static 
         */ 
        public static function filterExceptionsUsing($filterExceptionsCallable)
        {
                        /** @var \Spatie\FlareClient\Flare $instance */
                        return $instance->filterExceptionsUsing($filterExceptionsCallable);
        }
                    /**
         * 
         *
         * @static 
         */ 
        public static function filterReportsUsing($filterReportsCallable)
        {
                        /** @var \Spatie\FlareClient\Flare $instance */
                        return $instance->filterReportsUsing($filterReportsCallable);
        }
                    /**
         * 
         *
         * @param array<class-string<ArgumentReducer>|ArgumentReducer>|\Spatie\Backtrace\Arguments\ArgumentReducers|null $argumentReducers
         * @static 
         */ 
        public static function argumentReducers($argumentReducers)
        {
                        /** @var \Spatie\FlareClient\Flare $instance */
                        return $instance->argumentReducers($argumentReducers);
        }
                    /**
         * 
         *
         * @static 
         */ 
        public static function withStackFrameArguments($withStackFrameArguments = true)
        {
                        /** @var \Spatie\FlareClient\Flare $instance */
                        return $instance->withStackFrameArguments($withStackFrameArguments);
        }
                    /**
         * 
         *
         * @static 
         */ 
        public static function version()
        {
                        /** @var \Spatie\FlareClient\Flare $instance */
                        return $instance->version();
        }
                    /**
         * 
         *
         * @return array<int, FlareMiddleware|class-string<FlareMiddleware>> 
         * @static 
         */ 
        public static function getMiddleware()
        {
                        /** @var \Spatie\FlareClient\Flare $instance */
                        return $instance->getMiddleware();
        }
                    /**
         * 
         *
         * @static 
         */ 
        public static function setContextProviderDetector($contextDetector)
        {
                        /** @var \Spatie\FlareClient\Flare $instance */
                        return $instance->setContextProviderDetector($contextDetector);
        }
                    /**
         * 
         *
         * @static 
         */ 
        public static function setContainer($container)
        {
                        /** @var \Spatie\FlareClient\Flare $instance */
                        return $instance->setContainer($container);
        }
                    /**
         * 
         *
         * @static 
         */ 
        public static function registerFlareHandlers()
        {
                        /** @var \Spatie\FlareClient\Flare $instance */
                        return $instance->registerFlareHandlers();
        }
                    /**
         * 
         *
         * @static 
         */ 
        public static function registerExceptionHandler()
        {
                        /** @var \Spatie\FlareClient\Flare $instance */
                        return $instance->registerExceptionHandler();
        }
                    /**
         * 
         *
         * @static 
         */ 
        public static function registerErrorHandler()
        {
                        /** @var \Spatie\FlareClient\Flare $instance */
                        return $instance->registerErrorHandler();
        }
                    /**
         * 
         *
         * @param \Spatie\FlareClient\FlareMiddleware\FlareMiddleware|array<FlareMiddleware>|\Spatie\FlareClient\class-string<FlareMiddleware>|callable $middleware
         * @return \Spatie\FlareClient\Flare 
         * @static 
         */ 
        public static function registerMiddleware($middleware)
        {
                        /** @var \Spatie\FlareClient\Flare $instance */
                        return $instance->registerMiddleware($middleware);
        }
                    /**
         * 
         *
         * @return array<int,FlareMiddleware|class-string<FlareMiddleware>> 
         * @static 
         */ 
        public static function getMiddlewares()
        {
                        /** @var \Spatie\FlareClient\Flare $instance */
                        return $instance->getMiddlewares();
        }
                    /**
         * 
         *
         * @param string $name
         * @param string $messageLevel
         * @param array<int, mixed> $metaData
         * @return \Spatie\FlareClient\Flare 
         * @static 
         */ 
        public static function glow($name, $messageLevel = 'info', $metaData = [])
        {
                        /** @var \Spatie\FlareClient\Flare $instance */
                        return $instance->glow($name, $messageLevel, $metaData);
        }
                    /**
         * 
         *
         * @static 
         */ 
        public static function handleException($throwable)
        {
                        /** @var \Spatie\FlareClient\Flare $instance */
                        return $instance->handleException($throwable);
        }
                    /**
         * 
         *
         * @return mixed 
         * @static 
         */ 
        public static function handleError($code, $message, $file = '', $line = 0)
        {
                        /** @var \Spatie\FlareClient\Flare $instance */
                        return $instance->handleError($code, $message, $file, $line);
        }
                    /**
         * 
         *
         * @static 
         */ 
        public static function applicationPath($applicationPath)
        {
                        /** @var \Spatie\FlareClient\Flare $instance */
                        return $instance->applicationPath($applicationPath);
        }
                    /**
         * 
         *
         * @static 
         */ 
        public static function report($throwable, $callback = null, $report = null)
        {
                        /** @var \Spatie\FlareClient\Flare $instance */
                        return $instance->report($throwable, $callback, $report);
        }
                    /**
         * 
         *
         * @static 
         */ 
        public static function reportMessage($message, $logLevel, $callback = null)
        {
                        /** @var \Spatie\FlareClient\Flare $instance */
                        return $instance->reportMessage($message, $logLevel, $callback);
        }
                    /**
         * 
         *
         * @static 
         */ 
        public static function sendTestReport($throwable)
        {
                        /** @var \Spatie\FlareClient\Flare $instance */
                        return $instance->sendTestReport($throwable);
        }
                    /**
         * 
         *
         * @static 
         */ 
        public static function reset()
        {
                        /** @var \Spatie\FlareClient\Flare $instance */
                        return $instance->reset();
        }
                    /**
         * 
         *
         * @static 
         */ 
        public static function anonymizeIp()
        {
                        /** @var \Spatie\FlareClient\Flare $instance */
                        return $instance->anonymizeIp();
        }
                    /**
         * 
         *
         * @param array<int, string> $fieldNames
         * @return \Spatie\FlareClient\Flare 
         * @static 
         */ 
        public static function censorRequestBodyFields($fieldNames)
        {
                        /** @var \Spatie\FlareClient\Flare $instance */
                        return $instance->censorRequestBodyFields($fieldNames);
        }
                    /**
         * 
         *
         * @static 
         */ 
        public static function createReport($throwable)
        {
                        /** @var \Spatie\FlareClient\Flare $instance */
                        return $instance->createReport($throwable);
        }
                    /**
         * 
         *
         * @static 
         */ 
        public static function createReportFromMessage($message, $logLevel)
        {
                        /** @var \Spatie\FlareClient\Flare $instance */
                        return $instance->createReportFromMessage($message, $logLevel);
        }
                    /**
         * 
         *
         * @static 
         */ 
        public static function stage($stage)
        {
                        /** @var \Spatie\FlareClient\Flare $instance */
                        return $instance->stage($stage);
        }
                    /**
         * 
         *
         * @static 
         */ 
        public static function messageLevel($messageLevel)
        {
                        /** @var \Spatie\FlareClient\Flare $instance */
                        return $instance->messageLevel($messageLevel);
        }
                    /**
         * 
         *
         * @param string $groupName
         * @param mixed $default
         * @return array<int, mixed> 
         * @static 
         */ 
        public static function getGroup($groupName = 'context', $default = [])
        {
                        /** @var \Spatie\FlareClient\Flare $instance */
                        return $instance->getGroup($groupName, $default);
        }
                    /**
         * 
         *
         * @static 
         */ 
        public static function context($key, $value)
        {
                        /** @var \Spatie\FlareClient\Flare $instance */
                        return $instance->context($key, $value);
        }
                    /**
         * 
         *
         * @param string $groupName
         * @param array<string, mixed> $properties
         * @return \Spatie\FlareClient\Flare 
         * @static 
         */ 
        public static function group($groupName, $properties)
        {
                        /** @var \Spatie\FlareClient\Flare $instance */
                        return $instance->group($groupName, $properties);
        }
         
    }
     
}

    namespace Illuminate\Http { 
            /**
     * 
     *
     */ 
        class Request {
                    /**
         * 
         *
         * @see \Illuminate\Foundation\Providers\FoundationServiceProvider::registerRequestValidation()
         * @param array $rules
         * @param mixed $params
         * @static 
         */ 
        public static function validate($rules, ...$params)
        {
                        return \Illuminate\Http\Request::validate($rules, ...$params);
        }
                    /**
         * 
         *
         * @see \Illuminate\Foundation\Providers\FoundationServiceProvider::registerRequestValidation()
         * @param string $errorBag
         * @param array $rules
         * @param mixed $params
         * @static 
         */ 
        public static function validateWithBag($errorBag, $rules, ...$params)
        {
                        return \Illuminate\Http\Request::validateWithBag($errorBag, $rules, ...$params);
        }
                    /**
         * 
         *
         * @see \Illuminate\Foundation\Providers\FoundationServiceProvider::registerRequestSignatureValidation()
         * @param mixed $absolute
         * @static 
         */ 
        public static function hasValidSignature($absolute = true)
        {
                        return \Illuminate\Http\Request::hasValidSignature($absolute);
        }
                    /**
         * 
         *
         * @see \Illuminate\Foundation\Providers\FoundationServiceProvider::registerRequestSignatureValidation()
         * @static 
         */ 
        public static function hasValidRelativeSignature()
        {
                        return \Illuminate\Http\Request::hasValidRelativeSignature();
        }
                    /**
         * 
         *
         * @see \Illuminate\Foundation\Providers\FoundationServiceProvider::registerRequestSignatureValidation()
         * @param mixed $ignoreQuery
         * @param mixed $absolute
         * @static 
         */ 
        public static function hasValidSignatureWhileIgnoring($ignoreQuery = [], $absolute = true)
        {
                        return \Illuminate\Http\Request::hasValidSignatureWhileIgnoring($ignoreQuery, $absolute);
        }
         
    }
     
}

    namespace Illuminate\Database { 
            /**
     * 
     *
     */ 
        class Grammar {
                    /**
         * 
         *
         * @see \App\Infrastructure\Providers\DatabaseServiceProvider::registerPostgresTypes()
         * @param \Illuminate\Support\Fluent $column
         * @return string 
         * @static 
         */ 
        public static function typeText[]($column)
        {
                        return \Illuminate\Database\Grammar::typeText[]($column);
        }
                    /**
         * 
         *
         * @see \App\Infrastructure\Providers\DatabaseServiceProvider::registerPostgresTypes()
         * @param \Illuminate\Support\Fluent $column
         * @return string 
         * @static 
         */ 
        public static function typeString[]($column)
        {
                        return \Illuminate\Database\Grammar::typeString[]($column);
        }
                    /**
         * 
         *
         * @see \App\Infrastructure\Providers\DatabaseServiceProvider::registerPostgresTypes()
         * @param \Illuminate\Support\Fluent $column
         * @return string 
         * @static 
         */ 
        public static function typeInteger[]($column)
        {
                        return \Illuminate\Database\Grammar::typeInteger[]($column);
        }
         
    }
     
}

    namespace Illuminate\Console\Scheduling { 
            /**
     * 
     *
     */ 
        class Event {
                    /**
         * 
         *
         * @see \Sentry\Laravel\Features\ConsoleIntegration::setupInactive()
         * @param string|null $monitorSlug
         * @param int|null $checkInMargin
         * @param int|null $maxRuntime
         * @param bool $updateMonitorConfig
         * @static 
         */ 
        public static function sentryMonitor($monitorSlug = null, $checkInMargin = null, $maxRuntime = null, $updateMonitorConfig = true)
        {
                        return \Illuminate\Console\Scheduling\Event::sentryMonitor($monitorSlug, $checkInMargin, $maxRuntime, $updateMonitorConfig);
        }
         
    }
     
}

    namespace Illuminate\Database\Query\Grammars { 
            /**
     * 
     *
     */ 
        class PostgresGrammar {
         
    }
            /**
     * 
     *
     */ 
        class Grammar {
         
    }
     
}

    namespace Illuminate\Database\Schema\Grammars { 
            /**
     * 
     *
     */ 
        class PostgresGrammar {
         
    }
            /**
     * 
     *
     */ 
        class Grammar {
         
    }
     
}


namespace  { 
            class Cookie extends \Illuminate\Support\Facades\Cookie {}
            class DB extends \Illuminate\Support\Facades\DB {}
            class Log extends \Illuminate\Support\Facades\Log {}
            class Route extends \Illuminate\Support\Facades\Route {}
            class Schema extends \Illuminate\Support\Facades\Schema {}
            class Toolbar extends \Fruitcake\TelescopeToolbar\Toolbar {}
            class Registry extends \LaravelDoctrine\ORM\Facades\Registry {}
            class Doctrine extends \LaravelDoctrine\ORM\Facades\Doctrine {}
            class EntityManager extends \LaravelDoctrine\ORM\Facades\EntityManager {}
            class Sentry extends \Sentry\Laravel\Facade {}
            class Flare extends \Spatie\LaravelIgnition\Facades\Flare {}
     
}


namespace {
    

use Illuminate\Contracts\Support\DeferringDisplayableValue;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Arr;
use Illuminate\Support\Env;
use Illuminate\Support\HigherOrderTapProxy;
use Illuminate\Support\Optional;
use Illuminate\Support\Sleep;
use Illuminate\Support\Str;

if (! function_exists('append_config')) {
    /**
     * Assign high numeric IDs to a config item to force appending.
     *
     * @param  array  $array
     * @return array
     */
    function append_config(array $array)
    {
        $start = 9999;

        foreach ($array as $key => $value) {
            if (is_numeric($key)) {
                $start++;

                $array[$start] = Arr::pull($array, $key);
            }
        }

        return $array;
    }
}

if (! function_exists('blank')) {
    /**
     * Determine if the given value is "blank".
     *
     * @param  mixed  $value
     * @return bool
     */
    function blank($value)
    {
        if (is_null($value)) {
            return true;
        }

        if (is_string($value)) {
            return trim($value) === '';
        }

        if (is_numeric($value) || is_bool($value)) {
            return false;
        }

        if ($value instanceof Countable) {
            return count($value) === 0;
        }

        return empty($value);
    }
}

if (! function_exists('class_basename')) {
    /**
     * Get the class "basename" of the given object / class.
     *
     * @param  string|object  $class
     * @return string
     */
    function class_basename($class)
    {
        $class = is_object($class) ? get_class($class) : $class;

        return basename(str_replace('\\', '/', $class));
    }
}

if (! function_exists('class_uses_recursive')) {
    /**
     * Returns all traits used by a class, its parent classes and trait of their traits.
     *
     * @param  object|string  $class
     * @return array
     */
    function class_uses_recursive($class)
    {
        if (is_object($class)) {
            $class = get_class($class);
        }

        $results = [];

        foreach (array_reverse(class_parents($class)) + [$class => $class] as $class) {
            $results += trait_uses_recursive($class);
        }

        return array_unique($results);
    }
}

if (! function_exists('e')) {
    /**
     * Encode HTML special characters in a string.
     *
     * @param  \Illuminate\Contracts\Support\DeferringDisplayableValue|\Illuminate\Contracts\Support\Htmlable|\BackedEnum|string|null  $value
     * @param  bool  $doubleEncode
     * @return string
     */
    function e($value, $doubleEncode = true)
    {
        if ($value instanceof DeferringDisplayableValue) {
            $value = $value->resolveDisplayableValue();
        }

        if ($value instanceof Htmlable) {
            return $value->toHtml();
        }

        if ($value instanceof BackedEnum) {
            $value = $value->value;
        }

        return htmlspecialchars($value ?? '', ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8', $doubleEncode);
    }
}

if (! function_exists('env')) {
    /**
     * Gets the value of an environment variable.
     *
     * @param  string  $key
     * @param  mixed  $default
     * @return mixed
     */
    function env($key, $default = null)
    {
        return Env::get($key, $default);
    }
}

if (! function_exists('filled')) {
    /**
     * Determine if a value is "filled".
     *
     * @param  mixed  $value
     * @return bool
     */
    function filled($value)
    {
        return ! blank($value);
    }
}

if (! function_exists('object_get')) {
    /**
     * Get an item from an object using "dot" notation.
     *
     * @param  object  $object
     * @param  string|null  $key
     * @param  mixed  $default
     * @return mixed
     */
    function object_get($object, $key, $default = null)
    {
        if (is_null($key) || trim($key) === '') {
            return $object;
        }

        foreach (explode('.', $key) as $segment) {
            if (! is_object($object) || ! isset($object->{$segment})) {
                return value($default);
            }

            $object = $object->{$segment};
        }

        return $object;
    }
}

if (! function_exists('optional')) {
    /**
     * Provide access to optional objects.
     *
     * @param  mixed  $value
     * @param  callable|null  $callback
     * @return mixed
     */
    function optional($value = null, callable $callback = null)
    {
        if (is_null($callback)) {
            return new Optional($value);
        } elseif (! is_null($value)) {
            return $callback($value);
        }
    }
}

if (! function_exists('preg_replace_array')) {
    /**
     * Replace a given pattern with each value in the array in sequentially.
     *
     * @param  string  $pattern
     * @param  array  $replacements
     * @param  string  $subject
     * @return string
     */
    function preg_replace_array($pattern, array $replacements, $subject)
    {
        return preg_replace_callback($pattern, function () use (&$replacements) {
            foreach ($replacements as $value) {
                return array_shift($replacements);
            }
        }, $subject);
    }
}

if (! function_exists('retry')) {
    /**
     * Retry an operation a given number of times.
     *
     * @param  int|array  $times
     * @param  callable  $callback
     * @param  int|\Closure  $sleepMilliseconds
     * @param  callable|null  $when
     * @return mixed
     *
     * @throws \Exception
     */
    function retry($times, callable $callback, $sleepMilliseconds = 0, $when = null)
    {
        $attempts = 0;

        $backoff = [];

        if (is_array($times)) {
            $backoff = $times;

            $times = count($times) + 1;
        }

        beginning:
        $attempts++;
        $times--;

        try {
            return $callback($attempts);
        } catch (Exception $e) {
            if ($times < 1 || ($when && ! $when($e))) {
                throw $e;
            }

            $sleepMilliseconds = $backoff[$attempts - 1] ?? $sleepMilliseconds;

            if ($sleepMilliseconds) {
                Sleep::usleep(value($sleepMilliseconds, $attempts, $e) * 1000);
            }

            goto beginning;
        }
    }
}

if (! function_exists('str')) {
    /**
     * Get a new stringable object from the given string.
     *
     * @param  string|null  $string
     * @return \Illuminate\Support\Stringable|mixed
     */
    function str($string = null)
    {
        if (func_num_args() === 0) {
            return new class
            {
                public function __call($method, $parameters)
                {
                    return Str::$method(...$parameters);
                }

                public function __toString()
                {
                    return '';
                }
            };
        }

        return Str::of($string);
    }
}

if (! function_exists('tap')) {
    /**
     * Call the given Closure with the given value then return the value.
     *
     * @param  mixed  $value
     * @param  callable|null  $callback
     * @return mixed
     */
    function tap($value, $callback = null)
    {
        if (is_null($callback)) {
            return new HigherOrderTapProxy($value);
        }

        $callback($value);

        return $value;
    }
}

if (! function_exists('throw_if')) {
    /**
     * Throw the given exception if the given condition is true.
     *
     * @template TException of \Throwable
     *
     * @param  mixed  $condition
     * @param  TException|class-string<TException>|string  $exception
     * @param  mixed  ...$parameters
     * @return mixed
     *
     * @throws TException
     */
    function throw_if($condition, $exception = 'RuntimeException', ...$parameters)
    {
        if ($condition) {
            if (is_string($exception) && class_exists($exception)) {
                $exception = new $exception(...$parameters);
            }

            throw is_string($exception) ? new RuntimeException($exception) : $exception;
        }

        return $condition;
    }
}

if (! function_exists('throw_unless')) {
    /**
     * Throw the given exception unless the given condition is true.
     *
     * @template TException of \Throwable
     *
     * @param  mixed  $condition
     * @param  TException|class-string<TException>|string  $exception
     * @param  mixed  ...$parameters
     * @return mixed
     *
     * @throws TException
     */
    function throw_unless($condition, $exception = 'RuntimeException', ...$parameters)
    {
        throw_if(! $condition, $exception, ...$parameters);

        return $condition;
    }
}

if (! function_exists('trait_uses_recursive')) {
    /**
     * Returns all traits used by a trait and its traits.
     *
     * @param  object|string  $trait
     * @return array
     */
    function trait_uses_recursive($trait)
    {
        $traits = class_uses($trait) ?: [];

        foreach ($traits as $trait) {
            $traits += trait_uses_recursive($trait);
        }

        return $traits;
    }
}

if (! function_exists('transform')) {
    /**
     * Transform the given value if it is present.
     *
     * @template TValue of mixed
     * @template TReturn of mixed
     * @template TDefault of mixed
     *
     * @param  TValue  $value
     * @param  callable(TValue): TReturn  $callback
     * @param  TDefault|callable(TValue): TDefault|null  $default
     * @return ($value is empty ? ($default is null ? null : TDefault) : TReturn)
     */
    function transform($value, callable $callback, $default = null)
    {
        if (filled($value)) {
            return $callback($value);
        }

        if (is_callable($default)) {
            return $default($value);
        }

        return $default;
    }
}

if (! function_exists('windows_os')) {
    /**
     * Determine whether the current environment is Windows based.
     *
     * @return bool
     */
    function windows_os()
    {
        return PHP_OS_FAMILY === 'Windows';
    }
}

if (! function_exists('with')) {
    /**
     * Return the given value, optionally passed through the given callback.
     *
     * @template TValue
     * @template TReturn
     *
     * @param  TValue  $value
     * @param  (callable(TValue): (TReturn))|null  $callback
     * @return ($callback is null ? TValue : TReturn)
     */
    function with($value, callable $callback = null)
    {
        return is_null($callback) ? $value : $callback($value);
    }
}
 
}


