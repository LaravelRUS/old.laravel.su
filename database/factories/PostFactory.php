<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class PostFactory extends Factory
{
    public function definition()
    {
        return [
            'user_id' => random_int(1, 10), // Пример случайного значения user_id
            'title'   => fake()->sentence,
            'content' => fake()->text(400),
            'slug'    => function (array $attributes) {
                return Str::slug($attributes['title']);
            },
        ];
    }
}
