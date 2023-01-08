<?php

declare(strict_types=1);

namespace App\GitHub\Common;

use Github\Client;

/**
 * @mixin InteractWithApiInterface
 */
trait ApiTrait
{
    /**
     * @var Client
     */
    protected Client $client;

    /**
     * @param Client $client
     * @return void
     */
    protected function bootApiTrait(Client $client): void
    {
        $this->client = $client;
    }

    /**
     * @param InteractWithApiInterface $api
     * @return void
     */
    protected function bootFromApiInteractor(InteractWithApiInterface $api): void
    {
        $this->bootApiTrait($api->getClient());
    }

    /**
     * @return Client
     */
    public function getClient(): Client
    {
        return $this->client;
    }
}
