<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;

class TagController
{
    public function tag($id)
    {
        $tag = Tag::with(['posts.user', 'posts.category'])->where(['id' => $id])->first();
        return view('tag/index', compact('tag'));

    }

    private function getPosts($params = [])
    {
        $posts = Post::whereRelation(['user', 'category', 'tags']);
        if (!empty($params)) {
            $posts->where($params);
        }
        return $posts->get();
    }

}


