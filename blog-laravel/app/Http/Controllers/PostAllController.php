<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostAllController
{
    public function all($id, $category_id, $tag_id)
    {
        $posts = Post::with(['user', 'tags', 'category'])->where(['user_id' => $id, 'category_id' => $category_id])->whereRelation('tags', 'tags.id', '=', $tag_id)->get();
        return view('all/index', compact('posts'));
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

