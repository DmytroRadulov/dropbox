<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\PostTag;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostTagFactory extends Factory
{
    protected $model = PostTag::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'post_id' => 1,
            'tag_id' => 1,
        ];
    }
}
