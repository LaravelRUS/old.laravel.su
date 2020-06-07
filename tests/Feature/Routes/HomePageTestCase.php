<?php

/**
 * This file is part of laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Tests\Feature\Routes;

use Tests\TestCase;

/**
 * Class HomePageTestCase
 */
class HomePageTestCase extends TestCase
{
    /**
     * @return void
     */
    public function testStatusCode(): void
    {
        $this->get('/')
            ->assertStatus(200)
        ;
    }
}
