<?php

namespace App\Http\Controllers;

use App\Models\Post;

class CategoryController
{
    public function category($id)
    {
        $posts = $this->getPosts(['category_id' => $id]);
        return view('category/index', compact('posts'));
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
