<?php

namespace web\Controllers;

use Illuminate\Http\RedirectResponse;
use web\Models\Category;
use web\Models\Post;
use web\Models\Tag;
use Illuminate\Validation\Rule;

class PostController
{
    public function index()
    {
        $posts = Post::all();
        return view('post/index', compact('posts'));
    }

    public function trash()
    {
        $posts = Post::onlyTrashed()->get();
        return view('post/trash', compact('posts'));
    }

    public function restore($id)
    {
        Post::withTrashed()
            ->where('id', $id)
            ->restore();
        return new RedirectResponse('/post');
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view('post/show', compact('post'));
    }

    public function create()
    {
        $post = new Post();
        $isCreate = true;
        $categories = Category::all();
        $tags = Tag::all();
        return view('post/form', compact('post', 'categories', 'tags', 'isCreate'));
    }

    public function store()
    {
        $data = request()->all();

        $validator = validator()->make($data, [
            'title' => [
                'required',
                'unique:posts,title',
                'min:5',
            ],
            'slug' => ['required',
                'min:4',
                'unique:posts,slug',],
            'body' => ['required',
                'min:4',
                'unique:posts,body',],
            'category_id' => ['exists:categories,id'],
            'tags' => ['required', 'exists:tags,id'],
        ]);

        if ($validator->fails()) {
            $_SESSION['errors'] = $validator->errors()->toArray();
            $_SESSION['data'] = $data;
            return new RedirectResponse($_SERVER['HTTP_REFERER']);
        }

        $post = new Post();

        $post->title = $data['title'];
        $post->slug = $data['slug'];
        $post->body = $data['body'];
        $post->category_id = $data['category_id'];
        $post->save();

        $post->tags()->attach($data['tags']);

        $_SESSION['success'] = 'Record successfully added';
        return new RedirectResponse('/post');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $isCreate = false;
        $categories = Category::all();
        $tags = Tag::all();
        return view('post/form', compact('post', 'categories', 'tags', 'isCreate'));
    }

    public function update()
    {
        $data = request()->all();

        $post = Post::find($data['id']);
        $post->title = $data['title'];
        $post->slug = $data['slug'];
        $post->body = $data['body'];
        $post->category_id = $data['category_id'];

        $validator = validator()->make($data, [
            'title' => [
                'required',
                'min:5',
                Rule::unique('posts', 'title')->ignore($post->id),
            ],
            'slug' => ['required',
                'min:4',
                Rule::unique('posts', 'slug')->ignore($post->id),],
            'body' => ['required',
                'min:4',
                Rule::unique('posts', 'body')->ignore($post->id),],
            'category_id' => ['exists:categories,id'],
            'tags' => ['required', 'exists:tags,id'],
        ]);

        if ($validator->fails()) {
            $_SESSION['errors'] = $validator->errors()->toArray();
            $_SESSION['data'] = $data;
            return new RedirectResponse($_SERVER['HTTP_REFERER']);
        }
        $post->save();
        $post->tags()->sync($data['tags']);
        $_SESSION['success'] = 'Record successfully updated';
        return new RedirectResponse('/post');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        $_SESSION['success'] = 'Record successfully deleted';
        return new RedirectResponse('/post');
    }

    public function forceDelete($id)
    {
        $post = Post::find($id);
        $post->tags()->detach();
        $post->forceDelete();
        $_SESSION['success'] = 'Record successfully deleted';
        return new RedirectResponse('/post');
    }
}