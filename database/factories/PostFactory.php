<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => \App\Models\User::factory()->create(),
            'category_id' => \App\Models\Category::factory()->create(),
            'slug' => $this->faker->slug(),
            'title' => $this->faker->sentence(),
            'excerpt' => $this->faker->sentence(),
            'body' => $this->faker->paragraph(),
        ];
    }
}
