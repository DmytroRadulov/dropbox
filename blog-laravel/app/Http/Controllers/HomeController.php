<?php

namespace App\Http\Controllers;

use App\Models\Post;

class HomeController
{
    public function index()
    {
        $posts = $this->getPosts();
        return view('post/index', compact('posts'));

    }

    public function author($id)
    {
        $posts = $this->getPosts(['user_id' => $id]);
        return view('user/index', compact('posts'));

    }

    public function category($id)
    {
        $posts = $this->getPosts(['category_id' => $id]);
        return view('category/index', compact('posts'));

    }

    public function autcategory($id, $category_id)
    {
        $posts = $this->getPosts(['user_id' => $id, 'category_id' => $category_id]);
        return view('catuser/index', compact('posts'));
    }

    private function getPosts($params = [])
    {
        $posts = Post::with(['user', 'category']);
        if (!empty($params)) {
            $posts->where($params);
        }
        return $posts->get();
    }

}


