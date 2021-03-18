<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\GitHub;

use Github\Client;
use Illuminate\Contracts\Config\Repository as ConfigContract;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use Psr\Cache\CacheItemPoolInterface;

/**
 * Class GitHubServiceProvider
 */
class GitHubServiceProvider extends ServiceProvider
{
    /**
     * @var string
     */
    private const KEY_DEFAULT_CONNECTION = 'github.default';

    /**
     * @var string
     */
    private const KEY_CONNECTIONS = 'github.connections';

    /**
     * @return void
     */
    public function register(): void
    {
        $this->registerConfigs();
        $this->registerManager();
        $this->registerDefaultClient();
    }

    /**
     * @return void
     */
    private function registerConfigs(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([__DIR__ . '/../resources/github.php' => \config_path('github.php')]);
        }

        $this->mergeConfigFrom(__DIR__ . '/../resources/github.php', 'github');
    }

    /**
     * @return void
     */
    private function registerManager(): void
    {
        $this->app->singleton(Manager::class, function (Application $app): ManagerInterface {
            /** @var ConfigContract $config */
            $config = $this->app->make(ConfigContract::class);

            $manager = new Manager($app, $config->get(self::KEY_DEFAULT_CONNECTION));

            foreach ($config->get(self::KEY_CONNECTIONS) as $key => $driver) {
                $this->loadConnection($manager, $key, $driver);
            }

            return $manager;
        });

        $this->app->alias(Manager::class, ManagerInterface::class);
    }

    /**
     * @param Manager $manager
     * @param string $key
     * @param array $config
     * @return void
     */
    private function loadConnection(Manager $manager, string $key, array $config): void
    {
        $manager->extend($key, function () use ($config) {
            $client = new Client();
            $client->addCache($this->app->make(CacheItemPoolInterface::class));
            $client->authenticate($config['token'] ?? null, null, Client::AUTH_ACCESS_TOKEN);

            return $client;
        });
    }

    /**
     * @return void
     */
    private function registerDefaultClient(): void
    {
        $this->app->singleton(Client::class, static function (Application $app): Client {
            return $app->make(ManagerInterface::class)->driver();
        });
    }
}
