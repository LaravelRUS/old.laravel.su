<?php

declare(strict_types=1);

namespace App\GitHub;

use Github\Client;
use Illuminate\Contracts\Container\Container;
use Illuminate\Support\Manager as BaseManager;

class Manager extends BaseManager implements ManagerInterface
{
    /**
     * @var string
     */
    private string $default;

    /**
     * @param Container $container
     * @param string $default
     */
    public function __construct(Container $container, string $default)
    {
        $this->default = $default;

        parent::__construct($container);
    }

    /**
     * {@inheritDoc}
     */
    public function driver($driver = null): Client
    {
        return parent::driver($driver);
    }

    /**
     * @return string
     */
    public function getDefaultDriver(): string
    {
        return $this->default;
    }
}
