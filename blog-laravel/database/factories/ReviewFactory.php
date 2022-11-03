<?php

namespace Database\Factories;

use App\Models\Page;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $rand = $this->faker->randomElement([Post::class, Page::class]);
        return [
            'name' => fake()->name(),
            'description' => fake()->text(),
            'review_id' => $rand::factory(),
            'review_type' => $rand,
        ];
    }
}
