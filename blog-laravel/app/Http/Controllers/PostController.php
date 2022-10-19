<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController
{
    public function index()
    {
        $posts = Post::all();
        return view('post/index', compact('posts'));
    }
}
