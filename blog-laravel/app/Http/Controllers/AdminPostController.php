<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class AdminPostController
{
    public function index()
    {
        $posts = Post::paginate(6);
        return view('admin/post/index', compact('posts'));
    }

    public function create()
    {
        $post = new Post();
        $isCreate = true;
        $categories = Category::all();
        $tags = Tag::all();
        $users = User::all();
        return view('admin/post/form', compact('post', 'categories', 'tags', 'users', 'isCreate'));

    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => [
                'required',
                'unique:posts,title',
                'min:5',
            ],
            'body' => ['required',
                'min:4',
                'unique:posts,body',],
            'category_id' => ['exists:categories,id'],
            'user_id' => ['exists:users,id'],
            'tags' => ['required', 'exists:tags,id'],
        ]);

        $post = Post::create($request->all());
        $post->tags()->attach($request->input('tags'));
        return redirect()->route('admin.posts');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $isCreate = false;
        $categories = Category::all();
        $tags = Tag::all();
        $users = User::all();
        return view('admin.post/form', compact('post', 'categories', 'tags', 'users', 'isCreate'));
    }

    public function update(Request $request)
    {
        $post = Post::find($request->input('id'));
        $request->validate([
            'title' => [
                'required',
                'min:5',
                Rule::unique('posts', 'title')->ignore($post->id),
            ],
            'body' => ['required',
                'min:4',
                Rule::unique('posts', 'body')->ignore($post->id),],
            'category_id' => ['exists:categories,id'],
            'user_id' => ['exists:users,id'],
            'tags' => ['required', 'exists:tags,id'],
        ]);
        $post->update($request->all());
        $post->tags()->sync($request->input('tags'));
        return redirect()->route('admin.posts');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts');
    }
}
