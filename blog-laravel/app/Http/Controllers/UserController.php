<?php

namespace App\Http\Controllers;

use App\Models\Post;

class UserController
{
    public function author($id)
    {
        $posts = $this->getPosts(['user_id' => $id]);
        return view('user/index', compact('posts'));

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
