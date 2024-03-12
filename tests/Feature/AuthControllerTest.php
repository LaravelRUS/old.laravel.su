<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    public function testLoginRouteAccessibleForGuest(): void
    {
        $this->get(route('login'))
            ->assertOk();
    }

    public function testLoginRedirectsAuthenticatedUser(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $this->get(route('login'))
            ->assertRedirect();
    }

    public function testLogoutRedirectsToHome(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $this->post(route('logout'))
            ->assertRedirect(route('home'));
    }
}
