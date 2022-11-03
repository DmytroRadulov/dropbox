<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Models\Post;
use App\Models\Review;
use App\Models\Tag;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Facade;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::factory(25)->create();
        $users = User::factory(10)->create();
        $tags = Tag::factory(100)->create();

        $posts = Post::factory(100)->make()->each(function ($post) use ($categories, $users, $tags) {
            $post->category_id = $categories->random()->id;
            $post->user_id = $users->random()->id;
            $post->save();
            $post->tags()->attach($tags->random(rand(5, 10))->pluck('id'));
        });

        $pages = Page::factory(20)->create();
        $reviews = Review::factory(20)->create();
    }
}
