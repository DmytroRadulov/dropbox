<?php

namespace App\Http\Controllers;

use App\Models\Post;

class HomeController
{
    public function index()
    {
        return view('welcome');
    }
    public function autcategory($id, $category_id)
    {
        $posts = $this->getPosts(['user_id' => $id, 'category_id' => $category_id]);
        return view('catuser/index', compact('posts'));
    }

    private function getPosts($params = [])
    {
        $posts = Post::with(['user', 'category', 'tags']);
        if (!empty($params)) {
            $posts->where($params);
        }
        return $posts->get();
    }
}


