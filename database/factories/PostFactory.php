<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Category;

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
        
        // $user = (function() {
        //     if (User::count() == 0 || rand(0,100) % 4 == 0) {
        //         return User::factory()->create();
        //     } else {
        //         return User::all()->sortDesc()->first();
        //     }
        // })();

        $user = \App\Models\User::all()->random(1)->first();

        $category = (function() {
            if (Category::count() == 0 || rand(0,100) % 4 == 0) {
                return Category::factory()->create();
            } else {
                return Category::all()->sortDesc()->first();
            }
        })();


        return [
            'user_id' => $user,
            'category_id' => $category,
            'slug' => $this->faker->slug(),
            'title' => $this->faker->sentence(),
            'excerpt' => '<p>' . implode('</p><p>', $this->faker->paragraphs(2)) . '</p>',
            'body' => '<p>' . implode('</p><p>', $this->faker->paragraphs(5)) . '</p>'
        ];
    }
}
