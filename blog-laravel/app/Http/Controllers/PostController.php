<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController
{
    public function index()
    {
        $posts = Post::paginate(6);
        return view('post/index', compact('posts'));
    }
}
