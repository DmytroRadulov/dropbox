<?php

namespace Database\Seeders;

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
        $categories = \App\Models\Category::factory(25)->create();
        $users = \App\Models\User::factory(10)->create();
        \App\Models\Post::factory(100)->make()->each(function ($post) use ($categories, $users) {
            $post->category_id = $categories->random()->id;
            $post->user_id = $users->random()->id;
            $post->save();
        });
    }
}
