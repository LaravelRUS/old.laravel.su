<?php

namespace Tests\Feature;

use Tests\TestCase;

class CoverControllerTest extends TestCase
{
    public function testItCreatesImageWithGivenText(): void
    {
        $text = 'This is a test text for cover image generation.';

        $response = $this
            ->get(route('cover', ['text' => $text]))
            ->assertOk()
            ->assertHeader('Content-Type', 'image/jpeg');

        $this->assertNotEmpty($response->content());
    }
}
