<?php

namespace Database\Factories;

use App\Models\CodeSnippet;
use Illuminate\Database\Eloquent\Factories\Factory;

class CodeSnippetFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CodeSnippet::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'content' => $this->faker->text,
        ];
    }
}
