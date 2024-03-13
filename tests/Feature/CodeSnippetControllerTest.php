<?php

namespace Tests\Feature;

use App\Models\CodeSnippet;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class CodeSnippetControllerTest extends TestCase
{
    use WithFaker;

    public function testItDisplaysCodeSnippetCorrectly(): void
    {
        $snippet = CodeSnippet::factory()->create();

        $response = $this->get(route('pastebin', $snippet));

        $response
            ->assertOk()
            ->assertViewIs('pastebin.index')
            ->assertViewHas('content', $snippet->content);
    }

    public function testItStoresCodeSnippet(): void
    {
        $this->withoutExceptionHandling();

        $code = $this->faker->text(100);

        $response = $this->post(route('pastebin.store'), [
            'code' => $code,
        ]);

        $this->assertDatabaseHas('code_snippets', [
            'content' => $code,
            'user_id' => null,
        ]);

        $snippet = CodeSnippet::where('content', $code)->first();

        $response->assertStatus(Response::HTTP_FOUND)
            ->assertRedirect(route('pastebin', $snippet))
            ->assertSessionHasNoErrors();
    }

    public function testItStoresCodeSnippetWithAuthenticatedUser(): void
    {
        $this->withoutExceptionHandling();

        // Создание тестового пользователя и авторизация
        $user = User::factory()->create();
        $this->actingAs($user);

        $code = $this->faker->text(100);

        $response = $this->post(route('pastebin.store'), [
            'code' => $code,
        ]);

        $this->assertDatabaseHas('code_snippets', [
            'content' => $code,
            'user_id' => $user->id,
        ]);

        $snippet = CodeSnippet::where('content', $code)->first();

        $response->assertStatus(Response::HTTP_FOUND)
            ->assertRedirect(route('pastebin', $snippet))
            ->assertSessionHasNoErrors();
    }
}
